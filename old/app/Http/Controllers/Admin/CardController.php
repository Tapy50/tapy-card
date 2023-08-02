<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Support\Str;

class CardController extends Controller
{
    public function index()
    {
        return view('Admin.Card.index');
    }
    public function Analytics($serial){

        $data = Card::where('serial',$serial)->firstOrFail();

        return view('Admin.Card.analytics',compact('data'));
    }
    public function Calendar($serial = null){

        if(isset($serial)){
            $data = Card::where('serial',$serial)->firstOrFail();
        }else{
            $data = User::findOrFail(Auth::guard('web')->id());
        }

        return view('Admin.Card.calendar',compact('data'));
    }
    public function datatable(Request $request)
    {
        if(Auth::guard('admin')->check()){
            $data = Card::orderBy('id', 'desc');
            return DataTables::of($data)
                ->addColumn('checkbox', function ($row) {
                    $checkbox = '';
                    $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                    </div>';
                    return $checkbox;
                })

                ->editColumn('type', function ($row) {
                    if($row->type == 'employee'){
                        return $row->type .' for (' .$row->company->name.')';
                    }else{
                        return $row->type;
                    }
                })
                ->editColumn('user_id', function ($row) {
                    if($row->Profile){
                        $name = '<div class="d-flex align-items-center">
                                                                        <div class="symbol symbol-45px me-5">
                                                                            <img src="'.$row->Profile->image.'"  alt="" />
                                                                        </div>
                                                                        <div class="d-flex justify-content-start flex-column">
                                                                            <a href="'.url('User',$row->User->id).'" class="text-dark fw-bolder text-hover-primary fs-6">'.$row->User->name.'</a>
                                                                            <span class="text-muted fw-bold text-muted d-block fs-7">'.$row->User->phone.'</span>
                                                                        </div>
                                                                    </div>';
                        return $name;
                    }else{
                        $name = '<div class="d-flex align-items-center">
                                                                        <div class="symbol symbol-45px me-5">
                                                                            <img src="'.asset("assets/media/avatars/blank.png").'"  alt="" />
                                                                        </div>
                                                                        <div class="d-flex justify-content-start flex-column">
                                                                            <a href="'.url('User',$row->User->id).'" class="text-dark fw-bolder text-hover-primary fs-6">'.$row->User->name.'</a>
                                                                            <span class="text-muted fw-bold text-muted d-block fs-7">'.$row->User->phone.'</span>
                                                                        </div>
                                                                    </div>';
                        return $name;
                    }


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
                ->editColumn('profile_id', function ($row) {
                    $name = '';
                    $name .= ' <a class="text-gray-800 text-hover-primary mb-1" href="'.url('Profile',$row->User->id).'">' . $row->Profile->name . '</a>';
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
                ->editColumn('qrcode', function ($row) {
                    $name = ' <a class="btn btn-primary" download href="' . $row->qrcode . '">
                <i class="fa fa-download"></i>
                </a>';
                    return $name;
                })
                ->addColumn('actions',function ($row){
                    $link  ='https://tapycard.me/register/'.$row->serial;
                    $data = '

                    <a  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-link="#" data-bs-toggle="tooltip" onclick="copy(`'.$link.'`)" title="Click to copy card link">

                 <svg  style="width:20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 0c-35.3 0-64 28.7-64 64V288c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H224zM64 160c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H288c35.3 0 64-28.7 64-64V384H288v64H64V224h64V160H64z"/></svg>

              </a>';
                    $data .= '<a    class="btn btn-icon btn-bg-light btn-primary btn-sm me-1" href="'.url('Analytics',$row->serial).'" title="Analytics" >
                  <i style="color:#FFF!important;" class="bi bi-bar-chart-fill" ></i>
              </a>';
                    $data .= '<a  style="" class="btn btn-icon btn-danger btn-sm me-1" href="'.url('Calendar',$row->serial).'" title="Calender" >
                <i style="color:#FFF"  class="bi bi-calendar-check"></i>
              </a>';
                    $data .= '<a  style="" class="btn btn-icon btn-primary btn-sm me-1" href="'.url('ExchangeContact_setting?card_serial='.$row->serial).'" title="Exchange Contact" >
                <i style="color:#FFF!important"  class="bi bi-telephone-fill"></i>
              </a>';
                    if($row->is_lock == 1){
                        $data .= '<a  style="" class="btn btn-icon btn-danger btn-sm me-1 lock" onclick="lock('.$row->id.')" title="unlock" >
                <i style="color:#FFF"  class="bi bi-unlock-fill"></i>
              </a>';

                    }else{
                        $data .= '<a  style="" class="btn btn-icon btn-danger btn-sm me-1 lock" onclick="lock('.$row->id.')" title="lock" >
                <i style="color:#FFF"  class="bi bi-lock-fill"></i>
              </a>';

                    }
                    return $data;
                })
                ->rawColumns([ 'checkbox', 'is_active','user_id','profile_id','qrcode','actions','department'])
                ->make();
        }elseif(Auth::guard('web')->check()){
            if(Auth::guard('web')->user()->type == 'company'){
                $data = Card::orderBy('id', 'desc')->where(function ($query){
                    $query->where('user_id',Auth::guard('web')->id())->Orwhere('company_id',Auth::guard('web')->id());
                });
            }else{
                $data = Card::orderBy('id', 'desc')->where('user_id',Auth::guard('web')->id());
            }
            return DataTables::of($data)
                ->addColumn('checkbox', function ($row) {
                    $checkbox = '';
                    $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                    </div>';
                    return $checkbox;
                })


                  ->editColumn('qrcode', function ($row) {
                    $name = ' <a class="btn btn-primary" download href="' . $row->qrcode . '">
                <i style="color:#FFF;" class="fa fa-download"></i>
                </a>';
                    return $name;
                })
                ->editColumn('user_id', function ($row) {
                    $name = '<div class="d-flex align-items-center">
                                                                        <div class="symbol symbol-45px me-5">
                                                                            <img src="'.asset("assets/media/avatars/150-11.jpg").'"  alt="" />
                                                                        </div>
                                                                        <div class="d-flex justify-content-start flex-column">
                                                                            <a href="'.url('User',$row->User->id).'" class="text-dark fw-bolder text-hover-primary fs-6">'.$row->User->name.'</a>
                                                                            <span class="text-muted fw-bold text-muted d-block fs-7">'.$row->User->phone.'</span>
                                                                        </div>
                                                                    </div>';
                    return $name;

                })
                ->editColumn('profile_id', function ($row) {
                    $name = '';
                    $name .= ' <a class="text-gray-800 text-hover-primary mb-1" href="'.url('Profile',$row->User->id).'">' . $row->Profile->name . '</a>';
                    return $name;
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
                ->AddColumn('actions', function ($row) {
                    if($row->Profile->profile_url){
                        $link  ='https://tapycard.me/P/'.$row->Profile->profile_url;
                    }else{
                        $link  ='https://tapycard.me/register/'.$row->serial;
                    }

                    $data = '

                    <a  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-link="#" data-bs-toggle="tooltip" onclick="copy(`'.$link.'`)" title="Click to copy card link">

                 <svg  style="width:20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 0c-35.3 0-64 28.7-64 64V288c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H224zM64 160c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H288c35.3 0 64-28.7 64-64V384H288v64H64V224h64V160H64z"/></svg>

              </a>';
                    $data .= '<a    class="btn btn-icon btn-bg-light btn-primary btn-sm me-1" href="'.url('Analytics',$row->serial).'" title="Analytics" >
                  <i style="color:#FFF!important;" class="bi bi-bar-chart-fill" ></i>
              </a>';
                    $data .= '<a  style="" class="btn btn-icon btn-danger btn-sm me-1" href="'.url('Calendar',$row->serial).'" title="Calender" >
                <i style="color:#FFF"  class="bi bi-calendar-check"></i>
              </a>';
                    $data .= '<a  style="" class="btn btn-icon btn-primary btn-sm me-1" href="'.url('ExchangeContact_setting?card_serial='.$row->serial).'" title="Exchange Contact" >
                <i style="color:#FFF!important"  class="bi bi-telephone-fill"></i>
              </a>';

                    if(Auth::guard('web')->check() && Auth::guard('web')->user()->type != 'emoloyee')  {
                        $data .= '<a  style="" class="btn btn-icon btn-warning btn-sm me-1 edit" onclick="edit('.$row->id.')" title="edit" >
                <i style="color:#000"  class="bi bi-pencil-square"></i>
              </a>';
                        if ($row->is_lock == 1) {
                            $data .= '<a  style="" class="btn btn-icon btn-danger btn-sm me-1 lock" onclick="lock(' . $row->id . ')" title="unlock" >
                                        <i style="color:#FFF"  class="bi bi-unlock-fill"></i>
                                      </a>';

                        } else {
                            $data .= '<a  style="" class="btn btn-icon btn-danger btn-sm me-1 lock" onclick="lock(' . $row->id . ')" title="lock" >
                            <i style="color:#FFF"  class="bi bi-lock-fill"></i>
                          </a>';
                        }
                    }
                    return $data;
                })
                ->rawColumns([ 'checkbox', 'is_active','user_id','department','profile_id','qrcode','actions'])
                ->make();
        }
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
        $this->validate(request(), [
            'count' => 'required|string|max:50',
            'type' => 'required',
            'is_active' => 'nullable|string',
            'company_id' => 'required_if:type,employee',
        ]);


        for ($x = 1; $x <= $request->count; $x++) {

             if($request->type=='solo'){
                $serial='solo-'.Str::random(8);
            }elseif($request->type == 'company'){
                $serial='company-'.Str::random(8);
             }elseif($request->type == 'employee') {
                 $serial='team-'.Str::random(8);
             }elseif($request->type == 'exist') {
                 $serial='solo-'.Str::random(8);
             }
            $image = QrCode::format('png')
                ->size(500)->errorCorrection('H')
                ->generate('https://tapycard.me/code/'.$serial);

            $output_file = '/img/qr-code/img-'. $x . time() . '.png';
            $file =Storage::disk('local')->put($output_file, $image);

            $user = new Card;
            $user->serial=$serial;
            $user->secret=rand(100000,999999);
            $user->is_active=$request->is_active;
            $user->type=$request->type;
            if($request->type == 'employee') {
                $user->card_id=$request->card_id;
                if(Card::find($request->card_id)->User){
                    $user->company_id=Card::find($request->card_id)->User->id;
                }
             }
            if($request->type == 'exist') {
                $user->user_id=$request->user_id;
                $user->type='solo';

            }
            $user->qrcode=$output_file;
            $user->save();
        }
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
        $employee = Card::findOrFail($id);
        return view('admin.Card.edit', compact('employee'));
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
            'email' => 'required|email|unique:admins,email,' . $request->id,
            'password' => 'nullable|confirmed',
            'phone' => 'required|min:8|unique:admins,phone,' . $request->id,
            'is_active' => 'nullable|string',

        ]);



        $user = Card::whereId($request->id)->first();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->branch_id=$request->branch_id;
        $user->is_active=$request->is_active;
        if($request->role_id){
            $user->roles()->sync([$request->role_id]);
        }
        if(isset($user->password)){
            $user->password=Hash::make($request->password);
        }
        $user->save();





        return redirect(url('Card_setting'))->with('message',trans('Operation  success'));
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
            Card::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
    public function lock(Request $request)
    {
        try {
            $card= Card::where('id', $request->id)->first();
            if($card->is_lock == 1){
                $card->is_lock=0;
                $card->save();
            }else{
                $card->is_lock=1;
                $card->save();

            }

        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

    public function Edit_Card_profile(Request $request){

        $data = Card::findOrFail($request->id);
        return view('Admin.Card.editProfile',compact('data'));

    }

    public function update_Card_Profile(Request $request){
        $data = Card::findOrFail($request->id);
        $data->profile_id=$request->profile_id;
        $data->save();

        return redirect()->back()->with('message', trans('Operation  success'));

    }

}
