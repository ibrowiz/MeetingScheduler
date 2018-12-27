<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
     public function room()
    {
        return $this->belongsTo('App\Models\Room', 'room_email', 'room_email')->withDefault();
    }
}
