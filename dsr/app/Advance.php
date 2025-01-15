<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    //
    public function foruser(){
        return $this->belongsTo('App\User', 'user_id');
    }
    
}
