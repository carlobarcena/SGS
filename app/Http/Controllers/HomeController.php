<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\Student;
use App\Teacher;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $idcode = DB::table($table)->where($table_username, $username)->value('lastname');
        
         return view('home',compact('current_user','username','firstname','lastname','role'));
    }
}
