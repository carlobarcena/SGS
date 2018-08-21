<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Teacher;
use App\Admin;
use App\Student;

class EditProfileController extends Controller
{
    function editProfile(Request $request){
    	$current_user = Auth::user();
        $user = $current_user->username;
        $role = $current_user->role;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $rules = array(
        	'firstname' =>'required|min: 2|alpha',
        	'lastname' =>'required|min: 2|alpha',
            'email' =>'email'
        );
    	$this->validate($request,$rules);

    	if ($role == 'admin'){
            $table = 'admins';
            $table_username = 'username';
        }
        if ($role == 'teacher'){
            $table = 'teachers';
            $table_username = 'teacher_username';
        }
        if ($role == 'student'){
            $table = 'students';
            $table_username = 'student_username';
        }

        DB::table($table)
            ->where($table_username, $user)
            ->update(['firstname' => $firstname]);
        DB::table($table)
            ->where($table_username, $user)
            ->update(['lastname' => $lastname]);
        DB::table($table)
            ->where($table_username, $user)
            ->update(['email' => $email]);
        session(['profilechange' => 1]);
    	return redirect('home');
    }
    function show(){
    	$current_user = Auth::user();
        $user = $current_user->username;
        $role = $current_user->role;

    	if ($role == 'admin'){
            $table = 'admins';
            $table_username = 'username';
        }
        if ($role == 'teacher'){
            $table = 'teachers';
            $table_username = 'teacher_username';
        }
        if ($role == 'student'){
            $table = 'students';
            $table_username = 'student_username';
        }

        $username = DB::table($table)->where($table_username, $user)->value($table_username);
        $firstname = DB::table($table)->where($table_username, $user)->value('firstname');
        $lastname = DB::table($table)->where($table_username, $user)->value('lastname');
        $email = DB::table($table)->where($table_username, $user)->value('email');
    	return view('editprofile',compact('current_user','username','firstname','lastname','role','email'));
    }
}
