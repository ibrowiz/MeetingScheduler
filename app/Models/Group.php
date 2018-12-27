<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	protected $guarded = ['id'];

	public function users() {

		return $this->belongsToMany(User::class, 'group_user', 'group_id', 'user_id');
	}

}
