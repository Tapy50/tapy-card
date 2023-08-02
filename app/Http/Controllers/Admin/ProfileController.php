<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Category;
use App\Models\EmployeeDepartment;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\DataTables;
use Auth;
class ProfileController extends Controller
{
    public function index()
    {
        return view('Admin.Profile.index');
    }
    public function datatable(Request $request)
    {
        $data = Profile::orderBy('id', 'desc');

        if(Auth::guard('web')->check()) {
            if (Auth::guard('web')->user()->type == 'company') {

                if($request->category_id) {
                    $data->where('category_id', $request->category_id);
                }else{
                    $data->where(function ($q) {
                        $q->where('user_id', Auth::guard('web')->id())->OrWhere('company_id', Auth::guard('web')->id());
                    });
                }
            } else {
                $data->where('user_id', Auth::guard('web')->id());
            }
        }
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('name', function ($row) {
                if(Auth::guard('web')->check() && Auth::guard('web')->user()->type == 'company'){
                    if( $row->User->type == 'company'){
                        $data = $row->name .' <br>'.'(Company Profile)';
                    }else{
                        $data = $row->name;
                    }
                }else{
                    $data = $row->name;
                }
                return $data;
            })

            ->AddColumn('user', function ($row) {
                    $name = '<div class="d-flex align-items-center">
                                                                        <div class="symbol symbol-45px me-5">
                                                                            <img src="'.$row->image.'"  alt="" />
                                                                        </div>
                                                                        <div class="d-flex justify-content-start flex-column">
                                                                            <a href="'.url('User',$row->User->id).'" class="text-dark fw-bolder text-hover-primary fs-6">'.$row->User->name.'</a>
                                                                            <span class="text-muted fw-bold text-muted d-block fs-7">'.$row->User->phone.'</span>
                                                                        </div>
                                                                    </div>';
                    return $name;

            })
            ->AddColumn('profile', function ($row) {
                $url   = url('P/'.$row->profile_url);
                $name = '';
                $name .= ' <a class="btn btn-primary" href="'.$url.'" >'.__('lang.view').'</a>';
                return $name;
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
            ->addColumn('department', function ($row) {
                       if($parent = $row->Department->Parent){
                           if(isset($parent->Parent)){
                               $data = $parent->Parent->title .' => '.$parent->title .' => '.$row->Department->title;
                           }else{
                               $data = $parent->title .'=>'.$row->Department->title;
                           }
                       }else{
                           $data = $row->Department->title;
                       }

                return $data;
            })
            ->addColumn('actions', function ($row) {

                $link  =url('/mail-signature/'  .$row->profile_url);
                $actions = '

                    <a  target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-link="#" data-bs-toggle="tooltip" href="'.url('/mail-signature/'  .$row->profile_url).'"title="mail signature">
                    <i class="bi bi-envelope-fill"></i>
              </a>';
                if(Auth::guard('web')->check() && Auth::guard('web')->user()->type != 'employee')  {
                    $actions .= ' <a href="' . url("Profile_elements/social_links/" . $row->id) . '" class="btn btn-danger">' . __('lang.elements') . ' <i class="bi bi-eye"></i>  </a>';
                    $actions .= ' <a href="' . url("Profile-edit/" . $row->id) . '" class="btn btn-active-light-info">' . __('lang.Edit') . ' <i class="bi bi-pencil-fill"></i>  </a>';
                }elseif(Auth::guard('admin')->check()){
                    $actions .= ' <a href="' . url("Profile_elements/social_links/" . $row->id) . '" class="btn btn-danger">' . __('lang.elements') . ' <i class="bi bi-eye"></i>  </a>';
                    $actions .= ' <a href="' . url("Profile-edit/" . $row->id) . '" class="btn btn-active-light-info">' . __('lang.Edit') . ' <i class="bi bi-pencil-fill"></i>  </a>';
                }
                if(Auth::guard('web')->check() && Auth::guard('web')->user()->type == 'company' && $row->User->id != Auth::guard('web')->id() ){
                    $actions .= ' <a onclick="UpdateCat(' . $row->id. ')" class="btn btn-light-primary"> <i class="bi bi-building"></i>  </a>';
                    $actions .= ' <a href="' . url("review_setting/" . $row->id) . '" class="btn btn-active-light-info">'.__('lang.Reviews').'   </a>';
                }
                return $actions;

            })

            ->rawColumns([ 'checkbox', 'user', 'is_active','actions','profile','name','department'])
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
        if($request->user_id == Auth::guard('web')->id() && Auth::guard('web')->user()->type == 'company'){
            $data = $this->validate(request(), [
                'name' => 'required|string',
                'profile_url' => 'required|string|unique:profiles',
//                'ar_first_name' => 'required_if:lang,ar|',
//                'en_first_name' => 'required_if:lang,en',
//                'ar_last_name' => 'required_if:lang,ar',
//                'en_last_name' => 'required_if:lang,en',
                'ar_company' => 'required_if:lang,ar',
                'en_company' => 'required_if:lang,en',
                'ar_title' => 'required_if:lang,ar',
                'en_title' => 'required_if:lang,en',
                'ar_sub_title' => 'required_if:lang,ar',
                'en_sub_title' => 'required_if:lang,en',
                'ar_about' => 'required_if:lang,ar',
                'en_about' => 'required_if:lang,en',
                'is_active' => 'nullable|string',
                'image'=>'required|max:5024',
                'cover'=>'required|max:5024',
            ]);

        }else{
            $data = $this->validate(request(), [
                'name' => 'required|string',
                'profile_url' => 'required|string|unique:profiles',
                'ar_first_name' => 'required_if:lang,ar|',
                'en_first_name' => 'required_if:lang,en',
                'ar_last_name' => 'required_if:lang,ar',
                'en_last_name' => 'required_if:lang,en',
                'ar_company' => 'required_if:lang,ar',
                'en_company' => 'required_if:lang,en',
                'ar_title' => 'required_if:lang,ar',
                'en_title' => 'required_if:lang,en',
                'ar_sub_title' => 'required_if:lang,ar',
                'en_sub_title' => 'required_if:lang,en',
                'ar_about' => 'required_if:lang,ar',
                'en_about' => 'required_if:lang,en',
                'is_active' => 'nullable|string',
                'image'=>'required|max:5024',
                'cover'=>'required|max:5024',
            ]);

        }


        $user = new Profile;
        $user->name=$request->name;
        $user->profile_url=$request->profile_url;
        $user->ar_first_name=$request->ar_first_name;
        $user->en_first_name=$request->en_first_name;
        $user->ar_last_name=$request->ar_last_name;
        $user->en_last_name=$request->en_last_name;
        $user->ar_job_title=$request->ar_job_title;
        $user->en_job_title=$request->en_job_title;
        $user->ar_company=$request->ar_company;
        $user->en_company=$request->en_company;
        $user->ar_job_title=$request->ar_job_title;
        $user->en_job_title=$request->en_job_title;
        $user->ar_company=$request->ar_company;
        $user->en_company=$request->en_company;
        $user->ar_title=$request->ar_title;
        $user->en_title=$request->en_title;
        $user->ar_designation=$request->ar_designation;
        $user->en_designation=$request->en_designation;
        $user->ar_sub_title=$request->ar_sub_title;
        $user->en_sub_title=$request->en_sub_title;
        $user->ar_about=$request->ar_about;
        $user->en_about=$request->en_about;
        $user->image=$request->image;
        $user->cover=$request->cover;
        $user->is_active='active';
        $user->lang=$request->lang;
        if(Auth::guard('admin')->check()){
            $user->user_id=$request->user_id;
        }elseif(isset($request->user_id)){
            $user->user_id=$request->user_id;
        }else{
            $user->user_id=Auth::guard('web')->id();
        }
        if(Auth::guard('web')->user()->type == 'company'){
            $user->company_id=Auth::guard('web')->id();
        }
        $user->save();


        return redirect()->back()->with('message', trans('Operation  success'));


    }

    public function storeCompany(Request $request)
    {
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'profile_url' => 'required|string|unique:profiles',
            'ar_company' => 'required_if:lang,ar',
            'en_company' => 'required_if:lang,en',
            'ar_title' => 'required_if:lang,ar',
            'en_title' => 'required_if:lang,en',
            'ar_sub_title' => 'required_if:lang,ar',
            'en_sub_title' => 'required_if:lang,en',
            'ar_about' => 'required_if:lang,ar',
            'en_about' => 'required_if:lang,en',
            'is_active' => 'nullable|string',
            'image'=>'required|max:5024',
            'cover'=>'required|max:5024',
        ]);


        $user = new Profile;
        $user->name=$request->name;
        $user->profile_url=$request->profile_url;
        $user->ar_job_title=$request->ar_job_title;
        $user->en_job_title=$request->en_job_title;
        $user->ar_company=$request->ar_company;
        $user->en_company=$request->en_company;
        $user->ar_title=$request->ar_title;
        $user->en_title=$request->en_title;
        $user->ar_sub_title=$request->ar_sub_title;
        $user->en_sub_title=$request->en_sub_title;
        $user->ar_about=$request->ar_about;
        $user->en_about=$request->en_about;
        $user->image=$request->image;
        $user->cover=$request->cover;
        $user->is_active='active';
        $user->lang=$request->lang;
        if(Auth::guard('admin')->check()){
            $user->user_id=$request->user_id;
        }elseif(isset($request->user_id)){
            $user->user_id=$request->user_id;
        }else{
            $user->user_id=Auth::guard('web')->id();
        }
        if(Auth::guard('web')->user()->type == 'company'){
            $user->company_id=Auth::guard('web')->id();
        }
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
        $employee = Profile::findOrFail($id);
        return view('Admin.Profile.edit', compact('employee'));
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
            'id' => 'required|exists:profiles,id',
            'is_active' => 'nullable|string',
            'image'=>'nullable|max:5024|mimes:jpeg,png,jpg',
            'cover'=>'nullable|max:5024|mimes:jpeg,png,jpg',
            'profile_url' => 'required|string|unique:profiles,profile_url,'.$request->id,


        ]);



        $user = Profile::whereId($request->id)->first();
        $user->name=$request->name;
        $user->profile_url=$request->profile_url;
        $user->ar_first_name=$request->ar_first_name;
        $user->en_first_name=$request->en_first_name;
        $user->ar_last_name=$request->ar_last_name;
        $user->en_last_name=$request->en_last_name;
        $user->ar_job_title=$request->ar_job_title;
        $user->en_job_title=$request->en_job_title;
        $user->ar_company=$request->ar_company;
        $user->en_company=$request->en_company;
        $user->ar_job_title=$request->ar_job_title;
        $user->en_job_title=$request->en_job_title;
        $user->ar_company=$request->ar_company;
        $user->en_company=$request->en_company;
        $user->ar_title=$request->ar_title;
        $user->en_title=$request->en_title;
        $user->ar_designation=$request->ar_designation;
        $user->en_designation=$request->en_designation;
        $user->ar_sub_title=$request->ar_sub_title;
        $user->en_sub_title=$request->en_sub_title;
        $user->ar_about=$request->ar_about;
        $user->en_about=$request->en_about;
        $user->image=$request->image;
        $user->cover=$request->cover;
        $user->active_save_contact=$request->active_save_contact;
        $user->active_exchange_contact=$request->active_exchange_contact;
        if($request->is_active){
            $user->is_active=$request->is_active;
        }
        $user->lang=$request->lang;
        $user->save();

        return redirect(url('Profile_setting'))->with('message', 'تم التعديل بنجاح ');
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
            Profile::whereIn('id', $request->id)->update(['is_deleted'=>1]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
    public function getProfiles($id){
        $data = Profile::where('user_id',$id)->pluck('id','name');
        return response()->json($data);
    }


}
