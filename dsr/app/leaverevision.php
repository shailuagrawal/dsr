<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leaverevision extends Model
{
    //
    public function forleave()
    {
        return $this->belongsTo('App\Leaves', 'leave_id');
    }
    
}
