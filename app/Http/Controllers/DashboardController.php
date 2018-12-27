<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Room;
use App\Models\Meeting;
use App\Models\User;
use DB;

class DashboardController extends Controller {

	public function index() {
		$devices = Device::all();
		$rooms = Room::all();
		$users = User::all();
		$meetings = Meeting::all();

		//DB::where(DB::raw("DATE(created_at) = '".date('Y-m-d')."'"));
		$now = new \DateTime();
		//$now = $now->modify('- 10 day');

		$currentMeetings = Meeting::select(DB::raw('count(*) as meeting_count, room_email'))->where('start_time', 'like','%'. $now->format('Y-m-d') .'%')->groupBy('room_email')->get();

		
				return view('dashboard',compact('devices','rooms','users','meetings','currentMeetings'));
			}
}
