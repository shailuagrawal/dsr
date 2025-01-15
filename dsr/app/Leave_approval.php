<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave_approval extends Model
{
    //
    public function leave(){
        return $this->belongsTo('App\Leaves');
    }
    
    public function need_approval_from(){
        return $this->belongsTo('App\User', 'manager_id');
    }
    

    public function allManagers(){

        return $this->hasMany('App\User','id', 'manager_id');
    }

    
    public function employee(){
        
        return $this->hasManyThrough(
            'App\User', 'App\Leaves',
            'id', 'id', 'leave_id','user_id'
            );

        
//         return $this->hasManyThrough(
//                 'App\User', 'App\Leaves',
//                 'id', 'id', 'leave_id','user_id'
//                 );

        
    }
    
}
