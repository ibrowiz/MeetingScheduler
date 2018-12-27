<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Meeting;

class RoomController extends Controller
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
        $rooms = Room::all();
        return view('app.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('app.room.add'); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate \Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'roomName' => 'required',
            'mailServer' => 'required',
            'roomEmail' => 'required',
            'password' => 'required',
            'port' => 'required'
                ]);
                 $room = new Room;
                 $room->room_name = $request->input('roomName');
                 $room->mail_server = $request->input('mailServer');
                 $room->room_email = $request->input('roomEmail');
                 $room->password = $request->input('password');
                 $room->port = $request->input('port');
                 $room->description = $request->input('description');
                 $room->save();
                 
            return redirect('/room')->with('flash_message', 'Room Saved Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::find($id);
       
        return view('app.room.read', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $this->validate($request,[
            'roomName' => 'required',
            'mailServer' => 'required',
            'roomEmail' => 'required',
            'password' => 'required',
            'port' => 'required'
                ]);
                 $data = array(
                    'room_name' => $request->input('roomName'),
                    'mail_server' => $request->input('mailServer'),
                    'room_email' => $request->input('roomEmail'),
                    'password' => $request->input('password'),
                    'port' => $request->input('port'),
                    'description' => $request->input('description')
                 );
                 Room::where('id',$id)->update($data);
                 
            return redirect('/room')->with('flash_message', 'Room updated Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $rooms = Room::find($id);
       
        return view('app.room.update', compact('rooms'));
        //or use the code below
        //return view('room.update', ['rooms'=>$rooms]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $room = Room::find($request->room);

        Meeting::where('room_email', $room->room_email)->delete();

        Room::where('id',$request->room)->delete();
        
        return redirect('/room')->with('flash_message', 'Room deleted Successfully');
    }

}
