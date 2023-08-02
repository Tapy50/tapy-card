<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\ExchangeContact;
use App\Models\Profile;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ReviewController extends Controller
{
    public function index($id)
    {
        $profile_id = $id;
        return view('Admin.review.index',compact('profile_id'));
    }
    public function companyReview()
    {
        return view('Admin.review.index');
    }
    public function datatable(Request $request)
    {
        $data = Review::orderBy('id', 'desc');
        if($request->profile_id){
            $data->where('profile_id',$request->profile_id);
        }
        if(Auth::guard('web')->check()){
            if (Auth::guard('web')->user()->type == 'company') {
                $Profiles = Profile::where('user_id',Auth::guard('web')->id())->OrWhere('company_id', Auth::guard('web')->id())->pluck('id');
            } else {
                $Profiles = Profile::where('user_id',Auth::guard('web')->id())->pluck('id');
            }
            $data->whereIn('profile_id',$Profiles);
        }
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
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
            ->addColumn('profile', function ($row) {
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
            ->editColumn('created_at',function ($row){
                return Carbon::parse($row->created_at)->format('Y-m-d H:i');
            })
            ->rawColumns(['actions', 'checkbox','profile'])
            ->make();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function     store(Request $request)
    {
        $this->validate(request(), [
            'rating' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'quality' => 'required',
            'quickness' => 'required',
            'friendliness' => 'required',

        ]);

        $user = new Review();
        $user->quality=$request->quality;
        $user->friendliness=$request->friendliness;
        $user->quickness=$request->quickness;
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->note=$request->note;
        $user->rate=$request->rating;
        $user->profile_id=$request->profile_id;
//        $user->card_id=$profile->Card->id;
//        $user->user_id=$profile->user_id;
        $user->save();

        return redirect()->back()->with('message', trans('Operation  success'));


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


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

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Review::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
