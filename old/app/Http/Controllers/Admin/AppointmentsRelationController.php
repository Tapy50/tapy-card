<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Appointment;
use App\Models\AppointmentsRelation;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class AppointmentsRelationController extends Controller
{
    public function index()
    {
        return view('Admin.AppointmentsRelation.index');
    }
    public function datatable(Request $request)
    {
        $data = AppointmentsRelation::orderBy('id', 'desc');
        if(Auth::guard('web')->check()){
            if (Auth::guard('web')->user()->type == 'company') {
                $Profiles = Profile::where('user_id',Auth::guard('web')->id())->OrWhere('company_id', Auth::guard('web')->id())->pluck('id');
            } else {
                $Profiles = Profile::where('user_id',Auth::guard('web')->id())->pluck('id');
            }
            $data->where('is_deleted',0)->whereIn('profile_id',$Profiles);
        }
        if(isset($request->states) && $request->states != 0){
            $data->where('states',$request->states);
        }

        if(isset($request->from_date) && $request->from_date != 0){
            $data->whereDate('date','<=',$request->from_date);
        }

        if(isset($request->to_date) && $request->to_date != 0){
            $data->whereDate('date','>=',$request->to_date);
        }
        if(isset($request->user_id) && $request->user_id != 0){
            $Profiles = Profile::where('user_id',$request->user)->pluck('id');
            $data->whereIn('profile_id',$Profiles);
        }

        if(isset($request->profile_id) && $request->profile_id != 0){
            $data->where('profile_id',$request->profile_id);
        }
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->addColumn('User', function ($row) {
                $actions = $row->Profile->User->name;
                return $actions;

            })
            ->addColumn('department', function ($row) {
                if($row->Profile->Department){
                    if($parent = $row->Profile->Department->Parent){
                        if(isset($parent->Parent)){
                            $data = $parent->Parent->title .' => '.$parent->title .' => '.$row->Profile->Department->title;
                        }else{
                            $data = $parent->title .'=>'.$row->Profile->Department->title;
                        }
                    }else{
                        $data = $row->Profile->Department->title;
                    }
                }else{
                    $data = '--';
                }
                return $data;
            })
            ->addColumn('Profile', function ($row) {
                if(isset($row->Profile->Department)){
                    $actions = $row->Profile->name;
//                    $actions .= '<br>';
//                    $actions .= $row->Profile->Department->title;
                    return $actions;
                    }else{
                    $actions = $row->Profile->name;
                    return $actions;

                }

            })
            ->addColumn('Department', function ($row) {
                $actions = $row->Profile->Department->title;
                return $actions;

            })
            ->addColumn('time', function ($row) {
                $actions = $row->start_time .' - '.$row->end_time;
                return $actions;

            })

            ->addColumn('status', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">'.__('lang.complete').'</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">'.__('lang.new').'</div>';
                if ($row->states == 'complate') {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->editColumn('is_active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">Active</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">inactive</div>';
                if ($row->is_active == 'active') {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })

            ->addColumn('actions', function ($row) {
                //                $actions = ' <a onclick="edit('. $row->id . ')"  class="btn btn-active-light-info">Edit <i class="bi bi-pencil-fill"></i>  </a>';

                $actions = ' <a href="' . url("AppointmentsRelation-edit/" . $row->id) . '" class="btn btn-active-light-info">Edit <i class="bi bi-pencil-fill"></i>  </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'status', 'is_active','branch','Profile'])
            ->make();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function     store(Request $request)
    {
         $this->validate(request(), [
            'date' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',

        ]);
        $Appointmet = Appointment::find($request->appointment_id);

        if(AppointmentsRelation::whereDate('date',\Carbon\Carbon::parse($request->date)->format('Y-m-d'))->where('profile_id',$request->profile_id)->where('start_time',$Appointmet->start_time)->where('end_time',$Appointmet->end_time)->count() > 0){
            return back()->with('error_message','This date is already booked');
        }

        $profile = Profile::findOrFail($request->profile_id);
        $user = new AppointmentsRelation();
        $user->date=\Carbon\Carbon::parse($request->date)->format('Y-m-d');
        $user->start_time=$Appointmet->start_time;
        $user->end_time=$Appointmet->end_time;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->notes=$request->notes;
        $user->profile_id=$request->profile_id;
        $user->card_id=$profile->Card->id;
        $user->user_id=$profile->user_id;
        $user->save();

        return redirect()->back()->with('message',  trans('Operation  success'));


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = AppointmentsRelation::findOrFail($id);
        return view('Admin.AppointmentsRelation.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $this->validate(request(), [
            'date' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',

        ]);



        $user = AppointmentsRelation::whereId($request->id)->first();
        $user->end_time=$request->end_time;
        $user->start_time=$request->start_time;
        $user->date=$request->date;
        $user->is_deleted=$request->is_deleted;
        $user->states=$request->states;
        $user->comment=$request->comment;
        $user->save();





        return redirect(url('AppointmentsRelation_setting'))->with('message', 'تم التعديل بنجاح ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            AppointmentsRelation::whereIn('id', $request->id)->update(['is_deleted'=>1]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
