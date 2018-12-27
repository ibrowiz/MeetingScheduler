<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Room;

class DeviceController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $devices = Device::all();
        return view('app.device.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        
        return view('app.device.add',compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'deviceName' => 'required',
            'roomName' => 'required',
            'description' => 'required',
           
        ]);

        $devices = Device::all();

        $randDigit = $this->getDeviceID($devices);

        $device = new Device;
        $device->room_id = $request->input('roomName');
        $device->device_name = $request->input('deviceName');
        $device->device_no = $randDigit;
                 
        $device->description = $request->input('description');
        $device->save();
             
        return redirect('/device')->with('info', 'Device Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
         $device = Device::find($id);
       
        return view('app.device.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rooms = Room::all();

        $devices = Device::find($id);
       
        return view('app.device.edit', compact('devices','rooms'));
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
         $this->validate($request,[
            'deviceName' => 'required',
            'roomName' => 'required',
            'description' => 'required',
            
        ]);

         $data = array(
            'device_name' => $request->input('deviceName'),
            'room_id' => $request->input('roomName'),
            'description' => $request->input('description')
         );
         Device::where('id',$id)->update($data);
         
        return redirect('/device')->with('info', 'Device updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Device::find($request->device)->delete();
         return redirect('/device')->with('info', 'Device deleted Successfully');
    }

    public function getDeviceID($devices){

        $randDigit = substr(md5(microtime()),rand(0,26),10);
        $result = $devices->where('device_no', $randDigit)->first();
        if($result){
            $this->getDeviceID($devices);
        }

        return $randDigit;
    }
}
