<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id', 'name', 'label', 'description','permissions'
	];

	public function users() {

		return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
	}

	public function permissions() {

		return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
	}

	public function hasPermission($name) {
		if (is_array($name)) {
			foreach ($name as $permissionName) {
				$hasPermission = $this->hasPermission($permissionName);
				if ($hasPermission) {
					return true;
				}
			}

			return false;
		} else {
			return $this->permissions->contains('name', $name);
		}

		return false;
	}

	public function assign($user) {
		if (is_string($user)) {
			return $this->users()->save(
				User::whereUsername($user)->firstOrFail()
			);
		}

		return $this->users()->save($user);
	}

	public function revoke($user) {
		if (is_string($user)) {
			return $this->users()->detach(
				User::whereUsername($user)->firstOrFail()->id
			);
		}

		return $this->users()->detach($user->id);
	}

	public function give($permission) {
		if (is_string($permission)) {
			$perm = Permission::whereName($permission)->firstOrFail();
			return $this->permissions()->save($perm);
		}

		return $this->permissions()->save($permission);
	}

	public function take($permission) {
		if (is_string($permission)) {
			$perm = Permission::whereName($permission)->firstOrFail();
			return $this->permissions()->detach($perm->id);
		}
		return $this->permissions()->detach($permission->id);
	}

}
