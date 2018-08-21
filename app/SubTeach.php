<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTeach extends Model
{
    protected $table = 'subteachs';

    function groups() {
    	return $this->hasMany('App\Group','id','group_id');
    }
    
    function subject() {
    	return $this->belongsTo('App\Subject','subteach_id','id');
    }
}
