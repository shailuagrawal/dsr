<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaves_advance extends Model
{
    //
    protected $table = 'leaves_advance';
    
    protected $fillable = [
        'subject', 'emp_id', 'month', 'advance', 'half_day','late_mark', 'overtime' 
    ];
    
    public function employee(){
        return $this->hasOne('App\User', 'emp_id','emp_id');
    }
    
}
