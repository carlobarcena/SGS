<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    function students() {
    	return $this->hasMany('App\Student','group_id','id');
    }
}
