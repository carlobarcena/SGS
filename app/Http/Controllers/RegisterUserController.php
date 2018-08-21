<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Student;
use App\Teacher;
use App\Mark;
use App\Subject;
use App\SubTeach;
use DB;

class RegisterUserController extends Controller
{
    function register(Request $request){
    	$username = $request->username;
    	$role = $request->role;
    	$password = $request->password;

    	$user_obj = new User;
    	$user_obj->username = $username;
    	$user_obj->role = $role;
    	$user_obj->password = bcrypt($password);
    	$user_obj->save();

    	if($role == 'admin'){
    		$user_obj = new Admin();
    		$user_obj->username = $username;
    		$user_obj->save();
            $idcode = DB::table('admins')->where('username', $username)->value('id');
            $newcode = str_pad($idcode, 10, 'admin-000', STR_PAD_LEFT);
            DB::table('admins')
            ->where('username', $username)
            ->update(['idcode' => $newcode]);
    		session(['usesucreg' => 1]);
    	}
    	if($role == 'teacher'){
    		$user_obj = new Teacher();
    		$user_obj->teacher_username = $username;
    		$user_obj->save();
            $idcode = DB::table('teachers')->where('teacher_username', $username)->value('teacher_id');
            $newcode = str_pad($idcode, 12, 'teacher-000', STR_PAD_LEFT);
            DB::table('teachers')
            ->where('teacher_username', $username)
            ->update(['teacher_idcode' => $newcode]);
    		session(['usesucreg' => 1]);

            $subteach_obj = new SubTeach;
            $subteach_obj->subteach_id = 1;
            $subteach_obj->subteach_username = $username;
            $subteach_obj->group_id = 1;
            $subteach_obj->save();

    	} 
    	if($role == 'student'){
    		$user_obj = new Student();
    		$user_obj->student_username = $username;
    		$user_obj->save();
            $idcode = DB::table('students')->where('student_username', $username)->value('student_id');
            $newcode = str_pad($idcode, 12, 'student-000', STR_PAD_LEFT);
            DB::table('students')
            ->where('student_username', $username)
            ->update(['student_idcode' => $newcode]);
    		session(['usesucreg' => 1]);

            // ====Get Subjects====
            $subjects = Subject::all();
            for($i=0;$i<sizeof($subjects);$i++){
            // ====Set Marks====
                $subj_obj = new Mark;
                $subj_obj->mark_username = $username;
                $subj_obj->subject = $subjects[$i]->id;
                $subj_obj->save(); 
            }

    	} 
    	return redirect('registeruser');
    }
}
