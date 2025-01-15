<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timelog extends Model
{
    //
    
    public function forUser()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    
    
}
