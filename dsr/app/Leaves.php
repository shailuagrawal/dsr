<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    //
    
    public function foruser(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function approval(){
        return $this->hasMany('App\Leave_approval', 'leave_id');
        /*
        return $this->hasManyThrough(
            'App\User', 'App\Leave_approval',
            'leave_id', 'id', 'id','manager_id'
            );
        */    
    }
        
    public function leave_category(){
        return $this->belongsTo('App\Leave_categories', 'leave_category_id');
    }
    
    
    public function managerAppproval(){
       
        return $this->hasManyThrough(
            'App\User', 'App\Leave_approval',
            'leave_id', 'id', 'id','manager_id'
            );
    }
    
    
    public function revisions(){
        return $this->hasMany('App\leaverevision', 'leave_id');
    }
}