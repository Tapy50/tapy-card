<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Card;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Auth;
class UserController extends Controller
{
    public function index()
    {
        return view('Admin.User.index');
    }
    public function datatable(Request $request)
    {
        if(Auth::guard('admin')->check()){
             $data = User::orderBy('id', 'desc');
        }elseif(Auth::guard('web')->check() && Auth::guard('web')->user()->type == 'company'){
            $data = User::orderBy('id', 'desc')->where('company_id',Auth::guard('web')->id());
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
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
                return $name;
            })
            ->addColumn('department', function ($row) {
                if($row->Profile){
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
                }else{
                    $data = '--';

                }
                return $data;
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
                $actions = ' <a href="' . url("User-edit/" . $row->id) . '" class="btn btn-active-light-info">Edit <i class="bi bi-pencil-fill"></i>  </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'is_active','branch','department'])
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
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed',
            'phone' => 'required|unique:admins|min:8',
            'is_active' => 'nullable|string',

        ]);


        $user = new User();
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->password=Hash::make($request->password);
        $user->email=$request->email;
        $user->is_active=$request->is_active;
        $user->type=$request->type;
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
        $employee = User::findOrFail($id);
        return view('Admin.User.edit', compact('employee'));
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
            'id' => 'required|exists:users,id',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password' => 'nullable|confirmed',
            'phone' => 'required|min:8|unique:users,phone,' . $request->id,
            'username' => 'required|unique:users,username,' . $request->id,
            'is_active' => 'nullable|string',

        ]);



        $user = User::whereId($request->id)->first();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->username=$request->username;
        if($request->is_active){
            $user->is_active=$request->is_active;
        }
        if(isset($request->password)){
            $user->password=Hash::make($request->password);
        }
        $user->save();





        return redirect(url('User_setting'))->with('message',  trans('Operation  success'));
    }

    public function updateProfile(Request $request)
    {
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'id' => 'required|exists:users,id',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password' => 'nullable|confirmed',
            'phone' => 'required|min:8|unique:users,phone,' . $request->id,
            'username' => 'required|unique:users,username,' . $request->id,
            'is_active' => 'nullable|string',

        ]);



        $user = User::whereId($request->id)->first();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->username=$request->username;
        if($request->is_active){
            $user->is_active=$request->is_active;
        }
        if(isset($request->password)){
            $user->password=Hash::make($request->password);
        }
        $user->save();





        return back()->with('message',  trans('Operation  success'));
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
            Card::whereIn('user_id',$request->id)->update(['user_id'=>null]);
            Profile::whereIn('user_id',$request->id)->delete();
            User::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
