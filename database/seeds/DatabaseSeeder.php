<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {


		$user = App\Models\User::create([

			'firstname' => 'Abiodun',
			'lastname' => 'Adeyinka',
			'username' => 'Smartlife',
			'isAdmin' => 1,
			'email' => 'abiodun.adeyinka@telvida.com',
			'password' => bcrypt('secret'),

		]);

        $this->setupAccess();

	}


	private function create($name, $label, $note){
    	
    	Permission::create([
    		'name' => $name,
    		'label' => $label,
    		'description' => $note
    	]);
    }

    private function access($area){

    	$this->create($area.'.access', 'Access '.ucfirst($area).' Area', 'User can access '.$area.' area' );

    }

    private function crud($module, $only = []){

    	 $crud = (! empty($only)) ? $only : ['create', 'read', 'update', 'delete'];

    	 foreach( $crud as $access){

    	 	$this->create($module.'.'.$access, ucfirst($access).' a '. $module, str_plural($module).' '.$access);
    	 }

    }



    //Permission
    //
    
    private function setupAccess(){

    	
    	// $this->access('admin');
    	$this->access('permission');
    	$this->access('role');
    	$this->access('dashboard');
    	$this->access('user');
    	$this->access('room');
    	$this->access('meeting');
    	$this->access('device');
    	
    	$this->crud('device');
    	$this->crud('room');
    	$this->crud('role');
    	$this->crud('meeting');
    	$this->crud('user');
    	

        $this->crud('role', ['assign', 'withdraw']);

    }

}
