<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave_categories extends Model
{
    //
    
    public function leave(){
        return $this->hasOne('App\Leaves', 'leave_category_id');
    }
}
