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

class TeacherListController extends Controller
{
    function show(){
    	//$teacher_list = Teacher::all();
        $teacher_list = DB::table('teachers')
            ->join('subteachs','teachers.teacher_username','=','subteachs.subteach_username')
            ->leftjoin('groups','subteachs.group_id','=','groups.id')
            ->leftjoin('subjects','subteachs.subteach_id','=','subjects.id')
            ->select('teachers.*', 'groups.*','subteachs.*','subjects.title')
            ->orderBy('teacher_idcode','asc')
            ->get();
        $section_list = Group::all();
        $subject_list = Subject::all(); 
         //dd($teacher_list);
    	return view('teacherlist',compact('teacher_list','section_list','subject_list')); 
    }

     function delete(Request $request){
        $username = $request->username;
        $firstname = $request->firstname;
        $lastname = $request->lastname;

        $array = [$username,$firstname,$lastname];
        
        echo json_encode($array);
    }

    function deleteteacher(Request $request){
        $teacher_username = $request->teacheruser;
        User::where('username', $teacher_username)->delete();
        session(['teacher_delete' => 1]);
        return redirect('teacherlist');
    }

    function teachermodal(Request $request){
        $subject_list = Subject::all();
        $section_list = Group::all();
        $username = $request->username;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $section_there = $request->section;
        $subject = $request->subject;
      
        return view('teachermodals',compact('username','firstname','lastname','section_there','subject','subject_list', 'section_list'));
    }

    
}
