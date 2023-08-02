<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Profile;
use App\Models\ProfileElement;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PaymentController extends Controller
{
    public function datatable(Request $request)
    {
        $data = Payment::orderBy('id', 'desc')->where('profile_id',$request->profile_id);

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
                    return '<img src"'.$row->value.'" width="70px" height="40px">';
                }else{
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


            ->rawColumns([ 'checkbox', 'is_active','actions','value'])
            ->make();

    }
    public function store(Request $request)
    {
        $data = $this->validate(request(), [
            'profile_id' => 'required',
            'type' => 'required',
            'number' => 'required',

        ]);

            $pro = Profile::findOrFail($request->profile_id);
            $data =  new Payment();
            $data->number=$request->number;
            $data->type=$request->type;
            $data->bank_name=$request->bank_name;
            $data->iban=$request->iban;
            $data->profile_id=$request->profile_id;
            $data->user_id=$pro->user_id;
            $data->save();



        return redirect()->back()->with('message', trans('Operation  success'));


    }

    public function destroy(Request $request)
    {
        try {
            Payment::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
    public function activeAll(Request $request)
    {

        try {
            Payment::whereIn('id', $request->id)->update(['is_active'=>$request->type]);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

}
