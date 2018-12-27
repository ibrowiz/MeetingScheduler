<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

	public static function boot() {

		parent::boot();

		static::created(function ($user) {
			$user->profile()->save(new Profile);

		});

		static::deleting(function ($user) {
			$user->profile->delete();
		});

	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [
		'id',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function profile() {

		return $this->hasOne(Profile::class);
	}

	public function roles() {
		return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
	}

	public function groups() {
		return $this->belongsToMany(Group::class, 'group_user', 'user_id', 'group_id');
	}

	public function hasGroup($name) {
		if (is_array($name)) {
			foreach ($name as $groupName) {
				if ($this->hasGroup($groupName)) {
					return true;
				}
			}
		} else {
			return $this->groups->contains('name', $name);
		}

		return false;
	}

	public function hasRole($name) {
		if (is_array($name)) {
			foreach ($name as $roleName) {
				if ($this->hasRole($roleName)) {
					return true;
				}
			}
		} else {
			return $this->roles->contains('name', $name);
		}

		return false;
	}

	public function assginGroup($group) {
		if (is_string($group)) {
			return $this->groups()->save(Group::whereName($group)->firstOrFail());
		}
		return $this->groups()->save($group);
	}

	/**
	 * Give me a role
	 *
	 * @param mixed $role
	 *
	 * @return boolean
	 */
	public function assignRole($role) {
		if (is_string($role)) {
			return $this->roles()->save(Role::whereName($role)->firstOrFail());
		}

		return $this->roles()->save($role);
	}

	public function hasPermission($name) {
		if (is_array($name)) {
			foreach ($name as $permName) {
				if ($this->hasPermission($permName)) {
					return true;
				}
			}
		} else {

			// Check roles for permission
			foreach ($this->roles as $role) {
				if ($role->hasPermission($name)) {
					return true;
				}
			}
		}

		return false;
	}

	public function avatar() {
		$image = public_path($this->profile->avatar);

		if (!file_exists($image) || !$this->profile->avatar) {
			// Return default
			return 'avatars/default.jpg';
		}

		return $this->profile->avatar;
	}


	public function admin(){

		 

	}

	public function agent(){
		
	}

}
