<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;

class ProfileController extends Controller {
	

	public function index(){

		$user = Auth::user();

		// return dd($user);

		return view('app.profile.index', compact('user'));
	}

	public function edit(Request $request) {
		$user_id = Auth::user()->id;

		$user = User::find($user_id);

		return view('app.profile.edit', compact('user'));
	}

	public function update(Request $request, $id) {
		$this->validate($request, [
			'firstname' => 'required',
			'lastname' => 'required',
			'username' => 'required|unique:users,username,' . $id,
		]);

		$details = $request->all();

		$user = User::find($id);

		$user->lastname = $details['lastname'];
		$user->username = $details['username'];
		$user->firstname = $details['firstname'];

		$user->update();

		return back()->with('flash_message', 'Profile Updated');
	}

	function upload(Request $request){

		$this->validate($request, ['file' => 'mimes:jpeg,bmp,png,gif']);

		$profile = Auth::user()->profile;


    	
        if(isset($request->default)){
        	if($profile->avatar){
        		File::delete($profile->avatar);
        	}
        	$profile->avatar = '';
        	$profile->update();

        	return back()->with('flash_message', 'Profile Picture set to default');
        }
        elseif($request->file){
        	$imageName = chr(rand(65,90)).chr(rand(65,90)).time().'.'.$request->file->getClientOriginalExtension();

	    	$img = ImageIO::make($request->file);

			$img->resize(240, 240);

			$img->save("avatars/".$imageName);

	        if($profile->avatar){
        		File::delete($profile->avatar);
        	}

	        $profile->avatar = (String)'avatars/' . $imageName;

	        $profile->update();

	        return back()->with('flash_message', 'Profile Picture has been updated successfully');

        }

        return back()->with('fails', 'No Input Value, Upload an Image Or Check the Default box');
        
	}

	public function updatePassword(Request $request, $id) {

		$user = User::find($id);

		$this->validate($request, [
			'password' => 'required|min:5|confirmed',
		]);

		if (Hash::check($request->old_password, $user->password)) {
			$user = User::find($id);
			$user->password = Hash::make($request->password);
			$user->update();

			return back()->with('flash_message', 'Password Updated');
		} else {
			return back()->with('danger_message', 'Password not correct');
		}
	}
}
