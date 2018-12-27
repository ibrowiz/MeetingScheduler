<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller {

	public function index() {
		$permissions = Permission::get();

		return view('app.permission.index', compact('permissions'));
	}

	public function create() {
		return view('app.permission.create');
	}

	public function store(Request $request) {
		$this->validate($request, [
            'name' => 'required|string|max:255|unique:permissions',
            'label' => 'required|string|max:255|unique:permissions',
            'description' => 'required|string|max:255',
        ]);

		$data = $request->all();

		Permission::create([
			'name' => $data['name'],
			'label' => $data['label'],
			'description' => $data['description'],
        ]);

		return redirect('permission')->with('flash_message', 'Permission created');
	}

	public function show($id) {

	}

	public function edit($id) {

	}

	public function delete(Request $request) {

	}
}
