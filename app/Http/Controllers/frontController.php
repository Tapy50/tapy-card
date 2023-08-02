<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\Category;
use App\Models\ContactForm;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Page;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Shape;
use App\Models\User;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class frontController extends Controller
{

    public function home(){

        return view('front.index');
    }
    public function login(Request $request){

        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }
        if(Auth::guard('web')->check()){
            Auth::guard('web')->logout();
        }
        $credentials = $request->only('email', 'password');
        $remember_me = $request->has('remember_me') ? true : false;

        $user = User::where('email',$request->email)->first();
        $user2 = User::where('username',$request->email)->first();
        if(isset($user) && $user->is_active == 'inactive'){
            return back()->with('error', 'Please Check Your Mail To Activate Your Account');
        }
        if(isset($user2) && $user2->is_active == 'inactive'){
            return back()->with('error', 'Please Check Your Mail To Activate Your Account');
        }
        if (Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password,'is_active'=>'active'] ,$remember_me)) {
            // Authentication passed...
            if(Auth::guard('web')->user()->Profile){
                $lang = Auth::guard('web')->user()->Profile->lang;
                session()->put('lang',$lang);
            }
            return redirect()->intended('UserDashboard');
        }
        if (Auth::guard('web')->attempt(['username'=>$request->email,'password'=>$request->password,'is_active'=>'active'] ,$remember_me)) {
            // Authentication passed...
            // Authentication passed...
            if(Auth::guard('web')->user()->Profile){
            $lang = Auth::guard('web')->user()->Profile->lang;
            session()->put('lang',$lang);
            }
            return redirect()->intended('UserDashboard');
        }
        if (Auth::guard('admin')->attempt($credentials ,$remember_me)) {
            // Authentication passed...
            return redirect()->intended('/');
        }
        else {
            return back()->with('error', 'Sorry invalid credentials ');
        }

    }

    public function logout(){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();

        }
        if(Auth::guard('web')->check()){
        Auth::guard('web')->logout();
        }

        return redirect('/')->with('message','success');
    }

    public function register(){

        return view('front.register');
    }

    public function registerUser(Request $request){
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'phone' => 'required|unique:users|min:8',

        ]);
        $data = new User();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->password=Hash::make($request->password);
        $data->save();
        Auth::login($data);
        return redirect('/')->with('message', 'تم التعديل بنجاح ');

    }

    public function UpdateProfile(Request $request){
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'password' => 'nullable|confirmed',
            'phone' => 'required|min:11|unique:users,id,'.$request->id,

        ]);
        $data =  User::findOrFail($request->id);
        $data->name=$request->name;
//        $data->email=$request->email;
        $data->phone=$request->phone;
        if($request->password){
            $data->password=Hash::make($request->password);
        }
        $data->save();
        return back()->with('message', 'تم التعديل بنجاح ');

    }


    public function Setting(){

        if(Auth::guard('admin')->check()){
            $employee = Admin::findOrFail(Auth::guard('admin')->id());
        }else{
            $employee = User::findOrFail(Auth::guard('web')->id());

        }
        return view('Admin.Admin.Profile',compact('employee'));
    }


}
