<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use Auth;
use DB;
use App\Teacher;
use App\Admin;
use App\Student;
use App\Group;
use App\Subject;
use App\User;
use App\Mark;
use App\SubTeach;

class MagicController extends Controller
{
    function magic(){
    // Refresh Database
    Artisan::call('migrate:refresh');
    // ====Create Admin====
    $user_obj = new User;
	$user_obj->username = 'admin';
	$user_obj->role = 'admin';
	$user_obj->password = bcrypt('12345');
	$user_obj->save();

	$user_obj = new Admin();
	$user_obj->username = 'admin';
	$user_obj->save();

	// ====Create Sections====
	$sub_obj = new Group;
	$sub_obj->sectionname = '1-A';
	$sub_obj->save();

	$sub_obj = new Group;
	$sub_obj->sectionname = '1-B';
	$sub_obj->save();

	$sub_obj = new Group;
	$sub_obj->sectionname = '1-C';
	$sub_obj->save();

	$sub_obj = new Group;
	$sub_obj->sectionname = '1-D';
	$sub_obj->save();

	$sub_obj = new Group;
	$sub_obj->sectionname = '1-E';
	$sub_obj->save();

	// ====Create Subjects====
	$sub_obj = new Subject;
	$sub_obj->title = 'Math';
	$sub_obj->save();
    
    $sub_obj = new Subject;
	$sub_obj->title = 'Science';
	$sub_obj->save();

	$sub_obj = new Subject;
	$sub_obj->title = 'History';
	$sub_obj->save();

	$sub_obj = new Subject;
	$sub_obj->title = 'English';
	$sub_obj->save();

	$sub_obj = new Subject;
	$sub_obj->title = 'Physical Education';
	$sub_obj->save();
	$num=1;
	// ====Create Students====
	for($i=1;$i<51;$i++){
	$username[$i]='student' . $i;
	$user_obj = new User;
	$user_obj->username = $username[$i];
	$user_obj->role = 'student';
	$user_obj->password = bcrypt('12345');
	$user_obj->save();

	$user_obj = new Student();
	$user_obj->student_username = $username[$i];
	if($num>5){$num = 1;}
	$user_obj->group_id = $num;
	$num++;
	$user_obj->save();
	$idcode = DB::table('students')->where('student_username', $username[$i])->value('student_id');
    $newcode = str_pad($idcode, 12, 'student-000', STR_PAD_LEFT);
    DB::table('students')
    ->where('student_username', $username[$i])
    ->update(['student_idcode' => $newcode]);
    // ====Get Subjects====
    $subjects = Subject::all();
    for($k=0;$k<sizeof($subjects);$k++){
	// ====Set Marks====
    $subj_obj = new Mark;
    $subj_obj->mark_username = $username[$i];
    $subj_obj->mark1 = rand(70,100);
    $subj_obj->mark2 = rand(70,100);
    $subj_obj->mark3 = rand(70,100);
    $subj_obj->mark4 = rand(70,100);
    $subj_obj->subject = $subjects[$k]->id;
    $subj_obj->save(); 
    }
    }

    // ====Create Teachers====
    for($i=1;$i<6;$i++){
	$username[$i]='teacher' . $i;
	$user_obj = new User;
	$user_obj->username = $username[$i];
	$user_obj->role = 'teacher';
	$user_obj->password = bcrypt('12345');
	$user_obj->save();

    $user_obj = new Teacher();
	$user_obj->teacher_username = $username[$i];
	$user_obj->save();
    $idcode = DB::table('teachers')->where('teacher_username', $username[$i])->value('teacher_id');
    $newcode = str_pad($idcode, 12, 'teacher-000', STR_PAD_LEFT);
    DB::table('teachers')
    ->where('teacher_username', $username[$i])
    ->update(['teacher_idcode' => $newcode]);

    $subteach_obj = new SubTeach;
    $subteach_obj->subteach_id = $i;
    $subteach_obj->subteach_username = $username[$i];
    $subteach_obj->group_id = $i;
    $subteach_obj->save();

	}

	// Faker Mechanics
	Artisan::call('db:seed', [
         '--class' => 'StudentTableSeeder'
    ]);

    Artisan::call('db:seed', [
         '--class' => 'TeacherTableSeeder'
    ]);

	

	return redirect('/');
	}
}
