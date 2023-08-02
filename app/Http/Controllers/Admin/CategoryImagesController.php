<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryImage;
use App\Models\Payment;
use App\Models\Profile;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryImagesController extends Controller
{
    public function index($id){
        return view('Admin.CategoryImages.index',compact('id'));
    }
    public function datatable(Request $request)
    {
        $data = CategoryImage::orderBy('id', 'desc')->where('profile_id',$request->profile_id);

        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })



            ->rawColumns([ 'checkbox'])
            ->make();

    }
    public function store(Request $request)
    {
        $data = $this->validate(request(), [
            'ar_title' => 'required_without:en_title',
            'en_title' => 'required_without:ar_title',
        ]);

        $pro = Profile::findOrFail($request->profile_id);
        $data =  new CategoryImage();
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
            CategoryImage::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
