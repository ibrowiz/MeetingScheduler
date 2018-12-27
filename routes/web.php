<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function () {

    Route::resource('notebooks', 'NotebooksController');
    Route::resource('notes', 'NotesController');

    Route::get('notes/{notebookId}/createNote', 'NotesController@createNote')->name('notes.createNote');

});




Route::group(['middleware' => ['auth', 'notify'] ], function () {

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

	Route::group(['namespace' => 'App'], function () {

		// User Route Definition
		Route::get('user', ['as' => 'user.index', 'uses' => 'UserController@index']);

		Route::get('user/create', ['as' => 'user.create', 'uses' => 'UserController@create']);

		Route::post('user', ['as' => 'user.store', 'uses' => 'UserController@store']);

		Route::get('user/edit', ['as' => 'user.edit', 'uses' => 'UserController@edit']);

		Route::get('user/show/{id}', ['as' => 'user.show', 'uses' => 'UserController@show']);

		Route::put('user/update/{id}', ['as' => 'user.update', 'uses' => 'UserController@update']);

		Route::post('user/delete', ['as' => 'user.delete', 'uses' => 'UserController@delete']);

		Route::get('user/groups/{userId}', ['as' => 'user.group.edit', 'uses' => 'UserController@listUserGroups']);

		// Permission Route Definition
		Route::get('permission', ['as' => 'permission.index', 'uses' => 'PermissionController@index']);

		Route::get('permission/create', ['as' => 'permission.create', 'uses' => 'PermissionController@create']);

		Route::post('permission', ['as' => 'permission.store', 'uses' => 'PermissionController@store']);

		Route::get('permission/edit', ['as' => 'permission.edit', 'uses' => 'PermissionController@edit']);

		Route::get('permission/show', ['as' => 'permission.show', 'uses' => 'PermissionController@show']);

		Route::post('permission/update', ['as' => 'permission.update', 'uses' => 'PermissionController@update']);

		Route::post('permission/delete', ['as' => 'permission.delete', 'uses' => 'PermissionController@delete']);

		// Role Route Definition
		Route::get('role', ['as' => 'role.index', 'uses' => 'RoleController@index']);

		Route::get('role/create', ['as' => 'role.create', 'uses' => 'RoleController@create']);

		Route::post('role', ['as' => 'role.store', 'uses' => 'RoleController@store']);

		Route::get('role/edit/{id}', ['as' => 'role.edit', 'uses' => 'RoleController@edit']);

		Route::get('role/show/{id}', ['as' => 'role.show', 'uses' => 'RoleController@show']);

		Route::post('role/update/{id}', ['as' => 'role.update', 'uses' => 'RoleController@update']);

		Route::post('role/delete', ['as' => 'role.delete', 'uses' => 'RoleController@delete']);


		Route::get('profile', ['as' => 'profile.show', 'uses' => 'ProfileController@index' ]);

		Route::get('profile/edit', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit' ]);

		Route::put('profile/update/{id}', ['as' => 'profile.edit', 'uses' => 'ProfileController@update' ]);

		Route::put('profile/password/{id}', ['as' => 'profile.edit', 'uses' => 'ProfileController@updatePassword' ]);



		//  Device Route Definition
		
		Route::get('device', 'DeviceController@index');

		Route::get('device/create', 'DeviceController@create');

		Route::get('device/show/{id}', 'DeviceController@show');

		Route::post('saveDevice', 'DeviceController@store');

		Route::get('editDevice/{id}', 'DeviceController@edit');

		Route::post('updateDevice/{id}', 'DeviceController@update');

		Route::post('device/delete', 'DeviceController@destroy');

		Route::get('room', 'RoomController@index');

		Route::get('room/create', 'RoomController@create');

		Route::post('room/insert', 'RoomController@store');

		Route::get('room/update/{id}', 'RoomController@update');

		Route::post('room/edit/{id}', 'RoomController@edit');

		Route::get('room/read/{id}', 'RoomController@show');

		Route::post('room/delete', 'RoomController@destroy');

		Route::get('bookings/index', 'BookRoomController@index');

		Route::post('bookings/search', 'BookRoomController@searchRoom');

		Route::get('bookings', 'BookRoomController@bookings');

		Route::get('delbooking', 'BookRoomController@del');

		// Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

		Route::get('/meeting', 'MeetingController@index');

		Route::get('/meetings/{room}', 'MeetingController@room');

		Route::get('meeting/show/{id}', 'MeetingController@show');
		


	});
	Route::get('/saveAttachment', 'attachmentController@index');


});



		Route::get('getMeetings', 'App\MeetingAPIController@index')->middleware('cors');

		Route::post('device-update', 'App\MeetingAPIController@deviceUpdate')->middleware('cors');






Route::resource('gcalendar', 'gCalendarController');
Route::get('oauth', ['as' => 'oauthCallback', 'uses' => 'gCalendarController@oauth']);

Route::get('oauth2callback', ['as' => 'oauth2Callback', 'uses' => 'gCalendarController@callback']);

// Route::get('/', 'MeetingController@index');


/*Route::get('/saveAttachment', 'attachmentController@index');*/

Auth::routes();



Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');


Route::get('register-dev', function(Request $request){

 $device = \App\Models\Device::where('device_no', request('device') )->first(); 
 
 if($device){

     return response()->json($device->room, 200);
 }else{

     return response()->json(null, 400); 
 }
 


})->middleware('cors');