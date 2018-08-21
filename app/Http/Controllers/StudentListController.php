<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\Student;
use App\Teacher;
use App\Subject;
use App\Group;
use App\User;
use DB;

class StudentListController extends Controller
{
    function show(){
    	//$student_list = Student::all();
        $student_list = DB::table('students')
            ->leftjoin('groups', 'students.group_id', '=', 'groups.id')
            ->select('students.*', 'groups.*')
            ->orderBy('student_idcode','asc')
            ->get();
        $section_list = Group::all();
        $subject_list = Subject::all(); 
        // dd($student_list);
    	return view('studentlist',compact('student_list','section_list','subject_list')); 
    }

    function delete(Request $request){
        $username = $request->username;
        $firstname = $request->firstname;
        $lastname = $request->lastname;

        $msg = "This is a simple message.";
        $title = "title";
        $array = [$username,$firstname,$lastname];
        $color = ['red','blue','green'];
        // echo json_encode($color);
        echo json_encode($array);
    }

    function deletestudent(Request $request){
        $student_username = $request->studentuser;
        User::where('username', $student_username)->delete();
        session(['student_delete' => 1]);
        return redirect('studentlist');
    }

    function studentmodal(Request $request){
        $subject_list = Subject::all();
        $section_list = Group::all();
        $username = $request->username;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $section_there = $request->section;
        

        return view('studentmodals',compact('username','firstname','lastname','section_there','subject_list', 'section_list'));
    }
}
