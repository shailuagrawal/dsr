<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Systemrequest extends Model
{
    //
    
    function requestedBy(){
        return $this->belongsTo('App\User', 'user_id');
    }

    function forPc(){
        return $this->belongsTo('App\Pc', 'pc_id');
    }
}
