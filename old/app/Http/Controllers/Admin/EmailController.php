<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\sendmessage;
use App\Mail\VerificationEmail;
use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class EmailController extends Controller
{
    public function index()
    {
        return view('Admin.Email.index');
    }
    public function datatable(Request $request)
    {
        $data = Email::orderBy('id', 'desc');

        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })




            ->addColumn('actions', function ($row) {
                $actions = ' <a onclick="view(' . $row->id . ')" class="btn btn-active-light-info">view <i class="bi bi-eye"></i>  </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'is_active','branch'])
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
            'email' => 'required',
            'message' => 'required',

        ]);


        $user = new Email();
        $user->message=$request->message;
        $user->email=$request->email;
        $user->admin=Auth::guard('admin')->id();
        $user->save();

        $details=$request->message;
        Mail::to($request->email)->send(new sendmessage($details));

        return redirect()->back()->with('message', trans('Operation  success'));


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
            Email::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
