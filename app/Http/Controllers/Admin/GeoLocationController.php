<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Notifications\GeolocationNotification;

class GeoLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        //
        // $request->validate([
        //     'latitude' => 'required',
        //     'longitude' => 'required',
        // ]);
        try {
            $data = Profile::where('id', $id)->first();
            $data->geolocation = [
                'latitude' => $request->latitude, 
                'longitude' => $request->longitude, 
                'location_name' => $request->location_name,
                'location_link' => $request->location_link
            ];
            Notification::route('mail', 'tapycard2@gmail.com')
                ->notify(new GeolocationNotification($data));
        
            return response()->json([
                'status' => true,
                'message' => 'Geolocation data sent successfully',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            dd($e);
            return response()->json(['message' => 'Something went wrong']);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
