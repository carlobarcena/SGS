<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\Student;
use App\Teacher;
use App\Subject;
use App\Mark;
use App\Group;
use DB;

class GradeController extends Controller
{
    function show(){
    	$current_user = Auth::user();
        $user = $current_user->username;
    	//$subject_list = Subject::all();
    	$subject_list = DB::table('students')
            ->join('marks', 'students.student_username', '=', 'marks.mark_username')
            ->join('subjects', 'marks.subject', '=', 'subjects.id')
            ->select('students.*', 'marks.*','subjects.*')
            ->where('students.student_username',$user)
            ->get();
        //dd($subject_list);
        // ====Get Average Mark per Student====
        $average1 = DB::table('marks')
            ->where('mark_username',$user)
            ->avg('mark1');
        $average2 = DB::table('marks')
            ->where('mark_username',$user)
            ->avg('mark2');
        $average3 = DB::table('marks')
            ->where('mark_username',$user)
            ->avg('mark3');
        $average4 = DB::table('marks')
            ->where('mark_username',$user)
            ->avg('mark4');
        $trueave[] = $average1;
        $trueave[] = $average2;
        $trueave[] = $average3;
        $trueave[] = $average4;
       
    	return view('student_grade',compact('subject_list','trueave'));
    }
    function gradeStudent(){
        $subject = Teacher::find(1)->subteachs()->first();
        return view('sample',compact('subject'));
        // ====Get Subject of Teacher====
        
        $sslist = DB::table('teachers')
        	->join('subteachs', 'teachers.teacher_username', '=', 'subteachs.subteach_username')
            ->join('subjects', 'subteachs.subteach_id', '=', 'subjects.id')
            ->join('marks', 'subjects.id', '=', 'marks.subject')
            ->join('students', 'marks.mark_username', '=', 'students.student_username')
            ->join('groups','students.group_id','=','groups.id')
            ->select('students.*','marks.*','groups.sectionname','subjects.title','teachers.teacher_username')
            ->where('teachers.teacher_username',$user)
            ->get();
            dd($sslist);
        
        $looplist[0] = DB::table('teachers')
            ->join('subteachs', 'teachers.teacher_username', '=', 'subteachs.subteach_username')
            ->join('subjects', 'subteachs.subteach_id', '=', 'subjects.id')
            ->join('marks', 'subjects.id', '=', 'marks.subject')
            ->join('students', 'marks.mark_username', '=', 'students.student_username')
            ->join('groups','students.group_id','=','groups.id')
            ->select('students.*','marks.*','groups.sectionname','subjects.title','teachers.teacher_username')
            ->where('teachers.teacher_username',$user)
            ->orderBy('student_id','asc')
            ->get();

        for($i=1;$i<=sizeof($section);$i++){
            $looplist[$i] = DB::table('teachers')
            ->join('subteachs', 'teachers.teacher_username', '=', 'subteachs.subteach_username')
            ->join('subjects', 'subteachs.subteach_id', '=', 'subjects.id')
            ->join('marks', 'subjects.id', '=', 'marks.subject')
            ->join('students', 'marks.mark_username', '=', 'students.student_username')
            ->join('groups','students.group_id','=','groups.id')
            ->select('students.*','marks.*','groups.sectionname','subjects.title','teachers.teacher_username') 
            ->where('students.group_id',$i)
            ->where('teachers.teacher_username',$user)
            ->get();
        }
        // dd($stest);

          $test = DB::table('teachers')
        	->join('subteachs', 'teachers.teacher_username', '=', 'subteachs.subteach_username')
            ->join('subjects', 'subteachs.subteach_id', '=', 'subjects.id')
            ->join('marks', 'subjects.id', '=', 'marks.subject')
            ->join('students', 'marks.mark_username', '=', 'students.student_username')
            ->join('groups','students.group_id','=','groups.id')
            ->select('students.*','marks.*','groups.sectionname','subjects.title','teachers.teacher_username')
            ->where('teachers.teacher_username',$user)
            ->first();
         
          // ====Get Average Mark per Subject====
        $average1 = DB::table('marks')
            ->where('subject',$test->subject)
            ->avg('mark1');
        $average2 = DB::table('marks')
            ->where('subject',$test->subject)
            ->avg('mark2');
        $average3 = DB::table('marks')
            ->where('subject',$test->subject)
            ->avg('mark3');
        $average4 = DB::table('marks')
            ->where('subject',$test->subject)
            ->avg('mark4');
        $trueave[] = $average1;
        $trueave[] = $average2;
        $trueave[] = $average3;
        $trueave[] = $average4;
        
        $jmark[1] = 'mark1';
        $jmark[2] = 'mark2';
        $jmark[3] = 'mark3';
        $jmark[4] = 'mark4';
        for($i=1;$i<=sizeof($section);$i++){
            for($j=1;$j<=4;$j++){
            $marklist[$j][$i] = DB::table('teachers')
            ->join('subteachs', 'teachers.teacher_username', '=', 'subteachs.subteach_username')
            ->join('subjects', 'subteachs.subteach_id', '=', 'subjects.id')
            ->join('marks', 'subjects.id', '=', 'marks.subject')
            ->join('students', 'marks.mark_username', '=', 'students.student_username')
            ->join('groups','students.group_id','=','groups.id')
            ->select('students.*','marks.*','groups.sectionname','subjects.title','teachers.teacher_username') 
            ->where('students.group_id',$i)
            ->where('teachers.teacher_username',$user)
            ->avg($jmark[$j]);
            }
        }

        //dd($marklist);
       
         //dd($trueave);
        $span = 0;
       return view('gradeStudent',compact('sslist','test','looplist','section','span','marklist','trueave'));	
    }

    function updateGrade(Request $request){
    	$mark1 = $request->mark1;
    	$mark2 = $request->mark2;
    	$mark3 = $request->mark3;
    	$mark4 = $request->mark4;

        if(($mark1 < 0 || $mark2 < 0 || $mark3 < 0 || $mark4 < 0 ) || ($mark1 == "" || $mark2 == "" || $mark3 == "" || $mark4 == "" ))
        {
            session(['error_grade' => 1]);
            return redirect('gradeStudent');
        }

    	$mark[1] = $request->mark1;
    	$mark[2] = $request->mark2;
    	$mark[3] = $request->mark3;
    	$mark[4] = $request->mark4;

    	$markid = $request->studentuser;
        $span = $request->spantest; //<--for tabs
    	for($i=1;$i<5;$i++){
    		$test = '$mark' . $i;
    		DB::table('marks')
            ->where('mark_id', $markid)
            ->update(['mark' . $i => $mark[$i]]);
    	}
    	
        $current_user = Auth::user();
        $user = $current_user->username;

        $section = Group::all();
        
        // ====Syntax from gradeStudent=====
        $sslist = DB::table('teachers')
            ->join('subteachs', 'teachers.teacher_username', '=', 'subteachs.subteach_username')
            ->join('subjects', 'subteachs.subteach_id', '=', 'subjects.id')
            ->join('marks', 'subjects.id', '=', 'marks.subject')
            ->join('students', 'marks.mark_username', '=', 'students.student_username')
            ->join('groups','students.group_id','=','groups.id')
            ->select('students.*','marks.*','groups.sectionname','subjects.title','teachers.teacher_username')
            ->where('teachers.teacher_username',$user)
            ->get();
        
        $looplist[0] = DB::table('teachers')
            ->join('subteachs', 'teachers.teacher_username', '=', 'subteachs.subteach_username')
            ->join('subjects', 'subteachs.subteach_id', '=', 'subjects.id')
            ->join('marks', 'subjects.id', '=', 'marks.subject')
            ->join('students', 'marks.mark_username', '=', 'students.student_username')
            ->join('groups','students.group_id','=','groups.id')
            ->select('students.*','marks.*','groups.sectionname','subjects.title','teachers.teacher_username')
            ->where('teachers.teacher_username',$user)
            ->orderBy('student_id','asc')
            ->get();

        for($i=1;$i<=sizeof($section);$i++){
            $looplist[$i] = DB::table('teachers')
            ->join('subteachs', 'teachers.teacher_username', '=', 'subteachs.subteach_username')
            ->join('subjects', 'subteachs.subteach_id', '=', 'subjects.id')
            ->join('marks', 'subjects.id', '=', 'marks.subject')
            ->join('students', 'marks.mark_username', '=', 'students.student_username')
            ->join('groups','students.group_id','=','groups.id')
            ->select('students.*','marks.*','groups.sectionname','subjects.title','teachers.teacher_username') 
            ->where('students.group_id',$i)
            ->where('teachers.teacher_username',$user)
            ->get();
        }

          $test = DB::table('teachers')
            ->join('subteachs', 'teachers.teacher_username', '=', 'subteachs.subteach_username')
            ->join('subjects', 'subteachs.subteach_id', '=', 'subjects.id')
            ->join('marks', 'subjects.id', '=', 'marks.subject')
            ->join('students', 'marks.mark_username', '=', 'students.student_username')
            ->join('groups','students.group_id','=','groups.id')
            ->select('students.*','marks.*','groups.sectionname','subjects.title','teachers.teacher_username')
            ->where('teachers.teacher_username',$user)
            ->first();
            
        // ====Syntax from gradeStudent=====

         // ====Get Average Mark per Subject====
        $average1 = DB::table('marks')
            ->where('subject',$test->subject)
            ->avg('mark1');
        $average2 = DB::table('marks')
            ->where('subject',$test->subject)
            ->avg('mark2');
        $average3 = DB::table('marks')
            ->where('subject',$test->subject)
            ->avg('mark3');
        $average4 = DB::table('marks')
            ->where('subject',$test->subject)
            ->avg('mark4');
        $trueave[] = $average1;
        $trueave[] = $average2;
        $trueave[] = $average3;
        $trueave[] = $average4;
        
        $jmark[1] = 'mark1';
        $jmark[2] = 'mark2';
        $jmark[3] = 'mark3';
        $jmark[4] = 'mark4';
        for($i=1;$i<=sizeof($section);$i++){
            for($j=1;$j<=4;$j++){
            $marklist[$j][$i] = DB::table('teachers')
            ->join('subteachs', 'teachers.teacher_username', '=', 'subteachs.subteach_username')
            ->join('subjects', 'subteachs.subteach_id', '=', 'subjects.id')
            ->join('marks', 'subjects.id', '=', 'marks.subject')
            ->join('students', 'marks.mark_username', '=', 'students.student_username')
            ->join('groups','students.group_id','=','groups.id')
            ->select('students.*','marks.*','groups.sectionname','subjects.title','teachers.teacher_username') 
            ->where('students.group_id',$i)
            ->where('teachers.teacher_username',$user)
            ->avg($jmark[$j]);
            }
        }
        session(['success' => 1]);
        return view('gradeStudent',compact('sslist','test','looplist','section','span','marklist','trueave'));
    }

    function grademodal(Request $request){
        $username = $request->username;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $mark1 = $request->mark1;
        $mark2 = $request->mark2;
        $mark3 = $request->mark3;
        $mark4 = $request->mark4;
        $mark_id = $request->id;

        return view('studentgrademodals',compact('username','firstname','lastname','mark1','mark2','mark3','mark4','mark_id'));
    }
}
