<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Device extends Model
{
     public function room()
    {
        return $this->belongsTo('App\Models\Room', 'room_id', 'id')->withDefault();

       // return $this->belongsTo('App\Models\Room')->withdefaulth();----when expecting a null value
    }
}
