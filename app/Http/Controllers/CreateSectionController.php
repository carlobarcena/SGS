<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\Student;
use App\Teacher;
use App\Subject;
use App\Group;
use DB;

class CreateSectionController extends Controller
{
    function show(){
    	$section_list = Group::all();
    	return view('createsection',compact('section_list'));
    }

    function createSection(Request $request){
    	$section = $request->sectionname;

    	$sub_obj = new Group;
    	$sub_obj->sectionname = $section;
    	$sub_obj->save();
        session(['success' => 1]);
    	return redirect('createsection');
    }
    function updateSection_stu(Request $request){
    	$section = $request->selectsection;
    	$username = $request->studentuser;
    	DB::table('students')
            ->where('student_username', $username)
            ->update(['group_id' => $section]);
        session(['success' => 1]);
        return redirect('studentlist');
    }
    function updateSection_teach(Request $request){
        $section = $request->selectsection;
        $username = $request->teacheruser;
        $subject = $request->selectsubject;
        DB::table('subteachs')
            ->where('subteach_username', $username)
            ->update(['group_id' => $section]);
        DB::table('subteachs')
            ->where('subteach_username', $username)
            ->update(['subteach_id' => $subject]);
        session(['success' => 1]);
        return redirect('teacherlist');
    }

    function editSection(Request $request){
        $id = $request->id;
        $section = $request->section;
        return view('sectionmodal',compact('id','section'));
     }

     function editSection2(Request $request){
        $id = $request->input1;
        $section = $request->input2;
        $subject = Group::find($id);
        $subject->sectionname = $section;
        $subject->save();
        
        session(['success' => 1]);  
        return redirect('createsection');
     }

     function deleteSectionModal(Request $request){
        $id = $request->id;
        $section= $request->section;
        
        $array = [$id,$section];
        
        echo json_encode($array);
     }
     function deleteSection(Request $request){
        $id = $request->section_id;
        Group::where('id', $id)->delete();
        session(['success' => 1]);  
        return redirect('createsection');
     }
}
