<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AppointmentsRelation;
use App\Models\Card;
use App\Models\ExchangeContact;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class ExhangeContactController extends Controller
{
    public function index()
    {
        return view('Admin.ExchangeContact.index');
    }
    public function datatable(Request $request)
    {
        $data = ExchangeContact::orderBy('id', 'desc');
        if(Auth::guard('web')->check()){
            $data->where('is_deleted',0);
                if (Auth::guard('web')->user()->type == 'company') {
                    $Profiles = Profile::where('user_id',Auth::guard('web')->id())->OrWhere('company_id', Auth::guard('web')->id())->pluck('id');
                } else {
                    $Profiles = Profile::where('user_id',Auth::guard('web')->id())->pluck('id');
                }
            $data->whereIn('profile_id',$Profiles);
        }
        if($request->card_serial ){
            $card = Card::where('serial',$request->card_serial)->firstOrFail();
            $data->where('card_id',$card->id);
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
            ->addColumn('created_at', function ($row) {
                $data = Carbon::parse($row->created_at)->format('Y-m-d H:i');

                return $data;
            })


            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("ExchangeContact-edit/" . $row->id) . '" class="btn btn-active-light-info">Edit <i class="bi bi-pencil-fill"></i>  </a>';
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
    public function store(Request $request)
    {
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|min:8',

        ]);

        $Profile = Profile::findOrFail($request->profile_id);
        $user = new ExchangeContact;
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->profile_id=$Profile->id;
        $user->card_id=$Profile->Card->id;
        $user->user_id=$Profile->user_id;
        $user->save();

        return redirect()->back()->with('message', trans('Operation  success'));


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
        $employee = ExchangeContact::findOrFail($id);
        return view('Admin.ExchangeContact.edit', compact('employee'));
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
            'name' => 'required|string',
            'email' => 'required',
            'phone' => 'required',

        ]);



        $user = ExchangeContact::whereId($request->id)->first();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->email;
        $user->is_deleted=$request->is_deleted;
        $user->save();





        return redirect(url('ExchangeContact_setting'))->with('message', 'تم التعديل بنجاح ');
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
            ExchangeContact::whereIn('id', $request->id)->update(['is_deleted'=>1]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
