<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\Room;
use App\Http\Controllers\Controller;

//use App\Classes\imap;
class MeetingController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    
    function index(){

        $meetings  = Meeting::get();

        return view('app.meeting.all', compact('meetings'));
        
    }

    function room(Room $room){

        $meetings  = $room->meetings;

        return view('app.meeting.index', compact('room','meetings'));
    	
    }

    public function show($id)
    {
         $meeting = Meeting::find($id);

         // return dd($meeting);
       
        return view('app.meeting.show', compact('meeting'));
    }

}
