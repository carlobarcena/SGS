<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'student_id';

    function marks() {
    	return $this->hasMany('App\Mark','mark_username','student_username');
    }

    function group(){
    	return $this->belongsTo('App\Group');
    }
}
