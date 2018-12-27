<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller {

	public function index() {
		$roles = Role::get();

		return view('app.role.index', compact('roles'));
	}

	public function create() {

		$permissions = Permission::get();

		return view('app.role.create', compact('permissions'));
	}

	public function store(Request $request) {
		$this->validate($request, [
            'name' => 'required|string|max:255|unique:roles',
            'label' => 'required|string|max:255|unique:roles',
            'description' => 'required|string|max:255',
        ]);

		$data = $request->all();

		$role = Role::create([
			'name' => $data['name'],
			'label' => $data['label'],
			'description' => $data['description'],
        ]);

        if($request->has('permission')){

        	// foreach($request->permission as $perm){
        	// 	$perm = Permission::find($perm);
        	// 	$role->give($perm);

        	// }

        	$role->permissions()->sync($request->permission);

        }

		return redirect('role')->with('flash_message', 'Roles created');
	}


	public function show($id) {

		$permissions = Permission::get();

		$role = Role::with('permissions')->find($id);

		// dd($role->hasPermission('create'));

		return view('app.role.show', compact('role','permissions'));

	}

	public function edit($id) {

		$permissions = Permission::get();

		$role = Role::with('permissions')->find($id);

		// dd($role->hasPermission('create'));

		return view('app.role.edit', compact('role','permissions'));

	}

	public function update(Request $request, $id)
    {
         $this->validate($request,[
            'name' => 'required',
            'label' => 'required',
            'description' => 'required',
            
                ]);
         
            $details = $request->all();

		$role = Role::find($id);

		$role->name = $details['name'];
		$role->label = $details['label'];
		$role->description = $details['description'];
		//$role->isAdmin = isset($details['isAdmin']) ? 1 : 0;
		$role->update();
		if($request->has('permission')){


        	$role->permissions()->sync($request->permission);

        } 
        else{
        	$role->permissions()->detach();
        }

		return redirect('/role')->with('flash_message', 'Role Updated');

    }

	public function delete(Request $request) {

	}
}
