<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\Student;
use App\Teacher;
use App\Subject;
use App\Mark;
use DB;

class CreateSubjectController extends Controller
{
    function show(){
    	$subject_list = Subject::all();
    	return view('createsubject',compact('subject_list'));
    }

    function createSubject(Request $request){
    	$subject = $request->subjectname;
        
    	$sub_obj = new Subject;
    	$sub_obj->title = $subject;
    	$sub_obj->save();

        // Get Latest Subject
        $newsubj = DB::table('subjects')
            ->orderBy('created_at','desc')
            ->first();
        $student = Student::all();
        $subjects = Subject::all();

        // Get size of students
        for($i=0;$i<sizeof($student);$i++){
           
            // ====Set Marks====
            $subj_obj = new Mark;
            $subj_obj->mark_username = $student[$i]->student_username;
            $subj_obj->subject = $newsubj->id;
            $subj_obj->save();    
        session(['success' => 1]);   
        }
    	return redirect('createsubject');
     }

     function editSubject(Request $request){
        $id = $request->id;
        $title = $request->title;
        return view('subjectmodal',compact('id','title'));
     }

     function editSubject2(Request $request){
        $id = $request->input1;
        $title = $request->input2;
        $subject = Subject::find($id);
        $subject->title = $title;
        $subject->save();
        
        session(['success' => 1]);  
        return redirect('createsubject');
     }

     function deleteSubjectModal(Request $request){
        $id = $request->id;
        $title= $request->title;

        $array = [$id,$title];
        
        echo json_encode($array);
     }
     function deleteSubject(Request $request){
        $id = $request->subject_id;
        Subject::where('id', $id)->delete();
        session(['success' => 1]);  
        return redirect('createsubject');
     }
     
}
