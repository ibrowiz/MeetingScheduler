<?php
namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\Room;
use App\Models\Device;
use App\Models\Booking;
use DB;
use Auth;
use Carbon\Carbon;

class BookRoomController extends Controller
{
     public function __construct()
         {
            $this->middleware('auth');
         }

     public function index()
        {
            $rooms = Room::all();
            return view('app.room.book',compact('rooms'));
        }


    public function bookings()
        {
            $bookings = Booking::all();

            return view('app.room.bookings',compact('bookings'));
        }

    
     public function searchRoom(Request $request)
        {
            $date = $request->input('date-range');
            $startTime = $request->input('start_time');
            $endTime = $request->input('end_time');
            //return dd($date.' '.$startTime.' '.$endTime);
            if($request->input('submit') == 'search')
                {
                    $rooms = Room::all();
                    $meetings = Meeting::where('room_email',$request->roomName)->whereBetween('start_time', [$date.' '.$startTime, $date.' '.$endTime])->orWhereBetween('end_time', [$date.' '.$startTime, $date.' '.$endTime])->distinct()->get();

                    $bookings = Booking::where('room_email',$request->roomName)->whereBetween('start_time', [$date.' '.$startTime, $date.' '.$endTime])->orWhereBetween('end_time', [$date.' '.$startTime, $date.' '.$endTime])->distinct()->get();

                    $meetings = $meetings->merge($bookings);

                    //dd($meetings);

                 
                    if($meetings->count() > 0)
                        {
                            return view('app.room.searchresult',compact('rooms','meetings'));
                        }
                   else
                        {
                            
                         return back()->withInput();
                        }
                    
                }
            elseif($request->input('submit') == 'reserve')
                {
                
                    $this->validate($request, [
                    'roomName' => 'required',
                    'date-range' => 'required',
                    'start_time' => 'required',
                    'end_time' => 'required',
                     ]);

                    $booking = new Booking;
                    $booking->user_id = Auth::user()->id;
                    $booking->room_email = $request->roomName;
                    $booking->start_time = $date.' '.$startTime;
                    $booking->end_time = $date.' '.$endTime;
                    $booking->save();

                    return 'saved';
                }
            else
                    {

                    }
    }

    
}
