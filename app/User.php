<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
}
