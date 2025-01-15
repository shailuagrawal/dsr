<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    
    
    public function users()
    {
        return $this->hasMany('App\User');
    }
    
    public function manager()
    {
        return $this->belongsTo('App\User', 'manager_id');
    }

    
    public function projectmanager()
    {
        return $this->hasOne('App\User', 'manager_id');
    }
    
    public function dsrs(){
        return $this->hasMany('App\Dsr');
    }

    
    static function clean($string) {
        $string = str_replace(' ', '_', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }

    static function getDsrFields($content=''){
        $projectfields = [];
        $tmpFields = explode("\n", $content);
        foreach($tmpFields as $k => $field){
            if(trim($field)=='')
            {
                if(isset($tmpFields[$k-1]) && $tmpFields[$k-1]!='' && trim($field)=='')
                {
                    $projectfields[$k]['break'] = "<hr>";
                }
            }else
            {
                $tmpFieldDetails = explode('|', $field);
                
                
                if(isset($tmpFieldDetails[0]) && isset($tmpFieldDetails[1]))
                {
                    $variableName = Project::clean($tmpFieldDetails[0]);
                    
                    
                    $projectfields[$k]['field'] = trim($variableName);
                    $projectfields[$k]['title'] = trim($tmpFieldDetails[0]);
                    
                    
                    if(strtolower(trim($tmpFieldDetails[1]))!='text' && strtolower(trim($tmpFieldDetails[1]))!='textarea' && strtolower(trim($tmpFieldDetails[1]))!='number'){
                        $projectfields[$k]['type'] = 'text';
                    }else{
                        $projectfields[$k]['type'] = strtolower(trim($tmpFieldDetails[1]));
                    }
                    
                    
                    if(isset($tmpFieldDetails[2])){
                        $tmptarget =  explode(':', $tmpFieldDetails[2]);
                        $target = isset($tmptarget[1]) ? trim($tmptarget[1]) : 0;
                        $projectfields[$k]['target'] = $target;
                    }
                    
                }
                
            }
        }
        return $projectfields;
        
    }
}
