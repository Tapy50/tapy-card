<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\AppointmentsResource;
use App\Http\Resources\Api\ElementsResource;
use App\Http\Resources\Api\PaymentResource;
use App\Http\Resources\Api\ProfileResource;
use App\Models\Appointment;
use App\Models\AppointmentsRelation;
use App\Models\ExchangeContact;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function index(Request $request){
        $validator = Validator::make($request->all(), [
            'profile_url' => 'required|exists:profiles,profile_url',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return callback_data(error(), $validator->errors()->first());
        }
        $data  = Profile::where('profile_url',$request->profile_url)->firstOrFail();

        return callback_data(success(),'success_response',ProfileResource::make($data));

    }
    public function links(Request $request){
        $validator = Validator::make($request->all(), [
            'profile_url' => 'required|exists:profiles,profile_url',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return callback_data(error(), $validator->errors()->first());
        }
        $data  = Profile::where('profile_url',$request->profile_url)->firstOrFail();
        return callback_data(success(),'success_response',ElementsResource::collection($data->ElementsLinks));

    }
    public function social(Request $request){
        $validator = Validator::make($request->all(), [
            'profile_url' => 'required|exists:profiles,profile_url',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return callback_data(error(), $validator->errors()->first());
        }
        $data  = Profile::where('profile_url',$request->profile_url)->firstOrFail();
        return callback_data(success(),'success_response',ElementsResource::collection($data->ElementsSocial));

    }
    public function contact(Request $request){
        $validator = Validator::make($request->all(), [
            'profile_url' => 'required|exists:profiles,profile_url',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return callback_data(error(), $validator->errors()->first());
        }
        $data  = Profile::where('profile_url',$request->profile_url)->firstOrFail();
        return callback_data(success(),'success_response',ElementsResource::collection($data->ElementsContact));

    }
    public function images(Request $request){
        $validator = Validator::make($request->all(), [
            'profile_url' => 'required|exists:profiles,profile_url',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return callback_data(error(), $validator->errors()->first());
        }
        $data  = Profile::where('profile_url',$request->profile_url)->firstOrFail();
        return callback_data(success(),'success_response',ElementsResource::collection($data->ElementsImage));

    }
    public function videos(Request $request){
        $validator = Validator::make($request->all(), [
            'profile_url' => 'required|exists:profiles,profile_url',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return callback_data(error(), $validator->errors()->first());
        }
        $data  = Profile::where('profile_url',$request->profile_url)->firstOrFail();
        return callback_data(success(),'success_response',ElementsResource::collection($data->ElementsVideo));

    }
    public function payments(Request $request){
        $validator = Validator::make($request->all(), [
            'profile_url' => 'required|exists:profiles,profile_url',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return callback_data(error(), $validator->errors()->first());
        }
        $data  = Profile::where('profile_url',$request->profile_url)->firstOrFail();

        return callback_data(success(),'success_response',PaymentResource::collection($data->PaymentsApi));

    }
    public function appointments(Request $request){
        $validator = Validator::make($request->all(), [
            'profile_url' => 'required|exists:profiles,profile_url',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return callback_data(error(), $validator->errors()->first());
        }
        $data  = Profile::where('profile_url',$request->profile_url)->firstOrFail();

        return callback_data(success(),'success_response',AppointmentsResource::collection($data->AppointmentsِApi));

    }
    public function     storeAppointments(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_url' => 'required|exists:profiles,profile_url',
            'date' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'appointment_id'=>'required|exists:appointments,id'
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return callback_data(error(), $validator->errors()->first());
        }

        $Appointmet = Appointment::find($request->appointment_id);
        $profile  = Profile::where('profile_url',$request->profile_url)->firstOrFail();

        if(AppointmentsRelation::whereDate('date',\Carbon\Carbon::parse($request->date)->format('Y-m-d'))->where('profile_id',$request->profile_id)->where('start_time',$Appointmet->start_time)->where('end_time',$Appointmet->end_time)->count() > 0){
            return callback_data(success(),'already_booked');
        }

        $user = new AppointmentsRelation();
        $user->date=\Carbon\Carbon::parse($request->date)->format('Y-m-d');
        $user->start_time=$Appointmet->start_time;
        $user->end_time=$Appointmet->end_time;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->notes=$request->notes;
        $user->profile_id=$profile->id;
        $user->card_id=$profile->Card->id;
        $user->user_id=$profile->user_id;
        $user->save();


        return callback_data(success(),'success_response');

    }

    public function storeContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_url' => 'required|exists:profiles,profile_url',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return callback_data(error(), $validator->errors()->first());
        }

        $profile = Profile::where('profile_url', $request->profile_url)->firstOrFail();


        $user = new ExchangeContact;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->profile_id = $profile->id;
        $user->card_id = $profile->Card->id;
        $user->user_id = $profile->user_id;
        $user->save();

        return callback_data(success(), 'success_response');
    }

}
