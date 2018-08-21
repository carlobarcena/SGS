<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    function subteachs() {
    	return $this->hasMany('App\SubTeach','subteach_id','id');
    }

    function marks(){
    	return $this->hasMany('App\Mark','subject','id');
    }
}
