<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Group;
use App\Models\Role;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller {
	public function index() {
		$users = User::paginate(10);

		return view('app.user.index', compact('users'));
	}

	public function create() {

		$roles = Role::All();

		return view('app.user.create', compact('roles'));
	}

	public function store(Request $request) {
		$this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',						
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

		$data = $request->all();

		$user = User::create([
			'firstname' => $data['first_name'],
			'lastname' => $data['last_name'],
			'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            //'isAdmin' => isset($data['isAdmin'])? 1: 0, 
        ]);

        if($request->has('role')){

        	// foreach($request->permission as $perm){
        	// 	$perm = Permission::find($perm);
        	// 	$role->give($perm);

        	// }

        	$user->roles()->sync($request->role);

        }

		return redirect('user')->with('flash_message', 'User created');
	}

	public function show($id, Request $request) {

		$roles = Role::All();
		
		$user = User::find($id);
		return view('app.user.show', compact('user','roles'));
	}

	public function edit($id) {

	}

	public function update(Request $request, $id) {

		if ((!Auth::user()->isAdmin) & Auth::user()->id != $id) {
			return redirect()->back()->with('danger_message', 'Unautorized Access  !!!');
		}

		$this->validate($request, [
			'firstname' => 'required',
			'lastname' => 'required',
			'username' => 'required|unique:users,username,' . $id,
			'email' => 'required|email|unique:users,email,' . $id,
		]);

		$details = $request->all();

		$user = User::find($id);

		$user->lastname = $details['lastname'];
		$user->firstname = $details['firstname'];
		$user->username = $details['username'];
		$user->email = $details['email'];
		//$user->isAdmin = isset($details['isAdmin']) ? 1 : 0;

		$user->update();
		if($request->has('role')){


        	$user->roles()->sync($request->role);

        } 
        else{
        	$user->roles()->detach();
        }


		//return redirect('user/show/'.$id);

		return back()->with('flash_message', 'User Updated');
	}

	public function delete(Request $request) {

		$this->validate($request, ['user' => 'required']);

		User::destroy($request->user);

		return redirect('user')->with('flash_message', 'User Successfully Deleted');

	}
}
