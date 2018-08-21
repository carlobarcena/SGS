<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    function subject_table(){
    	return $this->belongsTo('App\Subject','subject','id');
    }

    function student() {
    	return $this->belongsTo('App\Student','mark_username','student_username');
    }
}
