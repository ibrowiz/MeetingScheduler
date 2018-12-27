<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller {

	public function index() {
		$groups = Group::paginate(10);

		return view('app.group.index', compact('groups'));
	}

	public function create() {
		return view('app.group.create');
	}

	public function store(Request $request) {
		$this->validate($request, [
            'name' => 'required|string|max:255|unique:groups',
            'label' => 'required|string|max:255|unique:groups',
            'description' => 'required|string|max:255',
        ]);

		$data = $request->all();

		Group::create([
			'name' => $data['name'],
			'label' => $data['label'],
			'note' => $data['description'],
        ]);

		return redirect('group')->with('flash_message', 'Group created');
	}

	public function show($id) {

	}

	public function edit($id) {

	}

	public function update(Request $request, $id) {

		if ((!Auth::user()->isAdmin) & Auth::user()->id != $id) {
			return redirect()->back()->with('danger_message', 'Unautorized Access  !!!');
		}

		return back()->with('flash_message', 'User Updated');
	}

	public function delete(Request $request) {

	}
}
