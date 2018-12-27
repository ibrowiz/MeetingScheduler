<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
   public function device()
    {
        return $this->hasMany('App\Models\Device');
    }

    public function bookings()
    {
        return $this->hasMany('App\Models\FlaggedContent');
    }

    public function meetings()
    {

    	return $this->hasMany(Meeting::class, 'room_email', 'room_email');
    }
}
