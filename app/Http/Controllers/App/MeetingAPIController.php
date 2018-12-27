<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\Device;

class MeetingAPIController extends Controller
{
    

     public function index(Request $request)
    {
        return response()->json(Meeting::where('room_email', $request->email)->orderBy('start_time','desc')->get(), 200);
    }

    public function show(Meeting $meeting)
    {
        return $meeting;
    }

    public function store(Request $request)
    {
        $meeting = Meeting::create($request->all());


        return response()->json($meeting, 201);
    }

    public function update(Request $request, Meeting $meeting)
    {
        $meeting->update($request->all());

        return response()->json($meeting, 200);
    }

    public function delete(Meeting $meeting)
    {
        $meeting->delete();

        return response()->json(null, 204);
    }

    public function deviceUpdate(Request $request){

        $device = Device::where('device_no', $request->device_no)->get()->first();

        if($device){
            
            $device->device_uuid = $request->device_uuid;
            $device->platform = $request->platform;
            $device->update();

        }

        \Log::info( $device  );

    }

}
