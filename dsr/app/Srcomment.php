<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Srcomment extends Model
{
    //

    function commentBy(){
        return $this->belongsTo('App\User', 'user_id');
    }

    
    function forSR(){
        return $this->belongsTo('App\Systemrequest', 'systemrequest_id');
    }
}
