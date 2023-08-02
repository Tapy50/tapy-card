<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Profile;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Auth;
class CategoryController extends Controller
{

    public function index($id){

        if(Auth::guard('admin')->check()){
            $data = Profile::findOrFail($id);
        }else{
            if(Auth::guard('web')->user()->type =='company'){
                $data = Profile::where('id',$id)->firstOrFail();
            }else{
                $data = Profile::where('id',$id)->where('user_id',Auth::guard('web')->id())->firstOrFail();
            }
        }
        $parent_id = null;
            return view('Admin.Elements.Category',compact('data','parent_id'));
    }

    public function datatable(Request $request)
    {
        $data = Category::orderBy('id', 'desc')->where('profile_id',$request->profile_id);
        if(isset($request->parent_id)){
            $data->where('parent_id',$request->parent_id);
        }else{
            $data->where('parent_id',null);

        }
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })

            ->editColumn('subCategory', function ($row) {
                if(!isset($row->Parent->Parent)){
                    $data = '<a class="btn btn-primary"  href="' . url('Profile_elements/Category/subcategory', $row->id) . '" > <i class="fa fa-eye"></i> <a>';
                    return $data;
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


            ->rawColumns([ 'checkbox', 'is_active','actions','value','subCategory'])
            ->make();

    }

    public function index2($id){

        $category = Category::find($id);
        if(Auth::guard('admin')->check()){
            $data = Profile::findOrFail($category->profile_id);
        }else{
            if(Auth::guard('web')->user()->type =='company'){
                $data = Profile::where('id',$category->profile_id)->firstOrFail();
            }else{
                $data = Profile::where('id',$category->profile_id)->where('user_id',Auth::guard('web')->id())->firstOrFail();
            }
        }
        $parent_id = $category->id;
        return view('Admin.Elements.Category',compact('data','parent_id'));
    }

    public function store(Request $request)
    {
        $pro = Profile::findOrFail($request->profile_id);

        $request->lang=$pro->lang;
        $data = $this->validate($request, [
            'profile_id' => 'required',
            'ar_title' => 'required_if:lang,ar',
            'en_title' => 'required_if:lang,en',

        ]);

        $data =  new Category();
        $data->ar_title=$request->ar_title;
        $data->en_title=$request->en_title;
        $data->parent_id=$request->parent_id;
        $data->profile_id=$request->profile_id;
        $data->image=$request->image;
        $data->is_active=$request->is_active;
        $data->save();



        return redirect()->back()->with('message', trans('Operation  success'));


    }

    public function destroy(Request $request)
    {
        try {
            Category::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
    public function activeAll(Request $request)
    {

        try {
            Category::whereIn('id', $request->id)->update(['is_active'=>$request->type]);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

    public function     ChangeProfileDepartment(Request $request){

       $data = Profile::find($request->id);
        $categories = Category::whereNull('parent_id')->get();
       return view('Admin.Profile.DepartmentModel',compact('data','categories'));
    }

    public function SubDepartment(Request $request){
        $data = Category::find($request->id);
        if(Category::where('parent_id',$request->id)->count() > 0 ){
            $Subcategories = Category::where('parent_id',$request->id)->get();
            return view('Admin.Profile.SubCategories',compact('Subcategories'));
        }
    }

    public function UpdateProfileDeparment(Request $request){
        $count = count($request->category_id);
        $data = Profile::find($request->id);
        $data->category_id=$request->category_id[$count -1];
        $data->save();

        return redirect()->back()->with('message', trans('Operation  success'));

    }

}
