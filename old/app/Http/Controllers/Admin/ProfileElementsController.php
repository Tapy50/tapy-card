<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\BusinessHour;
use App\Models\CategoryImage;
use App\Models\Payment;
use App\Models\Profile;
use App\Models\ProfileElement;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class ProfileElementsController extends Controller
{
    public function index($id){

        if(Auth::guard('admin')->check()){
            $data = Profile::findOrFail($id);
        }else{
            $data = Profile::where('id',$id)->where('user_id',Auth::guard('web')->id())->firstOrFail();
        }

        return view('Admin.ProfileElements.elements',compact('data'));
    }
   public function index2($type,$id){

        if(Auth::guard('admin')->check()){
            $data = Profile::findOrFail($id);
        }else{
            if(Auth::guard('web')->user()->type =='company'){
                $data = Profile::where('id',$id)->firstOrFail();
            }else{
                $data = Profile::where('id',$id)->where('user_id',Auth::guard('web')->id())->firstOrFail();
            }

        }
        return view('Admin.Elements.'.$type,compact('data'));
    }
    public function datatable(Request $request)
    {
        $data = ProfileElement::orderBy('id', 'desc')->where('profile_id',$request->profile_id);
        if(isset($request->type)){
            $data->where('type',$request->type);
        }
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('value', function ($row) {
                if($row->type == 'image'){
                    return '<img src="'.$row->value.'" width="70px" height="40px">';
                }elseif ($row->type == 'contact' & $row->sub_type == 'address'){
                    return '<a target="_blank" class="btn btn-danger" href="https://maps.google.com/?q='.$row->value.'" > <i class="bi-pin-map-fill"></i> </a>';
                } else{
                    return $row->value;
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
                $actions = ' <a href="' . url("ProfileElement-edit/" . $row->id) . '" class="btn btn-active-light-info">'.__('lang.Edit').' <i class="bi bi-pencil-fill"></i>  </a>';

                return $actions;

            })

            ->rawColumns([ 'checkbox', 'is_active','actions','value'])
            ->make();

    }
    public function store(Request $request)
    {
        $data = $this->validate(request(), [
            'profile_id' => 'required',
            'type' => 'required',
            'value' => 'required',
            'is_active' => 'nullable|string',

        ]);


        if(is_array($request->value)){
            foreach($request->value as $value) {
                $data = new ProfileElement();
                $data->profile_id = $request->profile_id;
                $data->type = $request->type;
                $data->sub_type = $request->sub_type;
                $data->value = $value;
                $data->ar_title = $request->ar_title;
                $data->en_title = $request->en_title;
                $data->is_active = $request->is_active;
                $data->category_id = $request->category_id;
                $data->save();
            }
        }else{
            if($request->type == 'contact' && $request->sub_type ==  'phone'){
                $value = $request->country_code . $request->value;
            }else if($request->type == 'social' && $request->sub_type ==  'whatsapp') {
                $value = $request->country_code . $request->value;
            }else if($request->type == 'contact' && $request->sub_type ==  'address') {
                $value = $request->lat .','. $request->lng;
            } else{
                $value =  $request->value;
            }

            $data =  new ProfileElement();
            $data->profile_id=$request->profile_id;
            $data->type=$request->type;
            $data->sub_type=$request->sub_type;
            $data->value=$value;
            $data->ar_title=$request->ar_title;
            $data->en_title=$request->en_title;
            $data->is_active=$request->is_active;
            $data->category_id = $request->category_id;
            $data->save();

        }

        return redirect()->back()->with('message', trans('Operation  success'));


    }

        public function destroy(Request $request)
    {
        try {
            ProfileElement::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }


    public function activeAll(Request $request)
    {

        try {
            ProfileElement::whereIn('id', $request->id)->update(['is_active'=>$request->type]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
    public function Store_BusinessHours(Request  $request){
          $this->validate(request(), [
            'day' => 'array|required',
            'start_time' => 'array|required',
            'end_time' => 'array|required',
            'profile_id' => 'required',

        ]);
        $start_time=$request->start_time;
        $end_time=$request->end_time;
        $active=$request->is_active;
        $days = $request->day;

        if(BusinessHour::where('profile_id',$request->profile_id)->count() > 0){
            foreach($request->day as $key => $day){

                $b = 'is_active'.$key;

                if(BusinessHour::where('day',$day)->where('profile_id',$request->profile_id)->count() >  0){

                    $data =   BusinessHour::where('day',$day)->where('profile_id',$request->profile_id)->first();
                    $data->start_time=$start_time[$key];
                    $data->end_time=$end_time[$key];
                    $data->is_active=$request->$b;
                    $data->save();
                }else{
                    $data =  new BusinessHour();
                    $data->profile_id=$request->profile_id;
                    $data->day=$day;
                    $data->start_time=$start_time[$key];
                    $data->end_time=$end_time[$key];
                    $data->is_active=$request->$b;
                    $data->save();
                }
            }
        }else{
            foreach($days as $key => $day){
                $b = 'is_active'.$key;
                $data =  new BusinessHour();
                $data->profile_id=$request->profile_id;
                $data->day=$day;
                $data->start_time=$start_time[$key];
                $data->end_time=$end_time[$key];
                $data->is_active=$request->$b;
                $data->save();
            }
        }

        return redirect()->back()->with('message', trans('Operation  success'));


    }


    public function storeCategory(Request $request){
        $this->validate(request(), [
            'ar_name' => 'required',
            'en_name' => 'required',
            'profile_id' => 'required',
        ]);
        $data = new CategoryImage();
        $data->ar_name=$request->ar_name;
        $data->en_name=$request->en_name;
        $data->profile_id=$request->profile_id;
        $data->save();

        return redirect()->back()->with('message', trans('Operation  success'));


    }
}
