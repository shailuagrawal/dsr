<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{    

    protected $fillable = ['user_id','doc_title','file_name'];

    public function user()
    {
        return $this->belongsTo('App\User')->withTrashed();
    } 


   
}
