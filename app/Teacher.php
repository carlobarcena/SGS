<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $primaryKey = 'teacher_id';

    function subteachs(){
    	return $this->hasMany('App\SubTeach','subteach_username','teacher_username');
    }
}
