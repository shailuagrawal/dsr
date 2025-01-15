<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addressupdate extends Model
{
    //
    
	public function project()
	{
		return $this->belongsTo('App\User');
	}
}
