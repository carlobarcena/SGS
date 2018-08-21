<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/registeruser', function () {
    return view('registeruser');
})->name('registeruser');
Route::post('/registeruser','RegisterUserController@register');

Route::get('/editprofile', 'EditProfileController@show')->name('editprofile');
Route::post('/editprofile', 'EditProfileController@editProfile');
Route::get('/changepassword', 'ChangePasswordController@show')->name('changepassword');
Route::post('/changepassword', 'ChangePasswordController@changePassword');

Route::get('/teacherlist', 'TeacherListController@show')->name('teacherlist');
// Route::post('/teacherlist', 'TeacherListController@search');
Route::get('/studentlist', 'StudentListController@show')->name('studentlist');
// Route::post('/studentlist', 'StudentListController@search');

Route::get('/createsubject','CreateSubjectController@show')->name('createsubject');
Route::post('/createsubject','CreateSubjectController@createSubject');

Route::get('/createsection','CreateSectionController@show')->name('createsection');
Route::post('/createsection','CreateSectionController@createSection');

Route::get('/updatesection-stu','CreateSectionController@updateSection_stu')->name('updateSection-stu');
Route::get('/updatesection-teach','CreateSectionController@updateSection_teach')->name('updateSection-teach');

Route::get('/student_grade', 'GradeController@show')->name('student_grade');

Route::get('/gradeStudent', 'GradeController@gradeStudent')->name('gradeStudent');

Route::post('/updateGrade','GradeController@updateGrade')->name('updateGrade');

Route::post('/deletestudentmodal','StudentListController@delete');
Route::post('/deletestudent','StudentListController@deletestudent')->name('deleteStudent');

Route::post('/deleteteachermodal','TeacherListController@delete');
Route::post('/deleteteacher','TeacherListController@deleteteacher')->name('deleteTeacher');
Route::post('/deletesubject','CreateSubjectController@deleteSubject')->name('deleteSubject');
Route::post('/deletesubjectModal','CreateSubjectController@deleteSubjectModal');
Route::post('/deletesection','CreateSectionController@deleteSection')->name('deleteSection');
Route::post('/deletesectionModal','CreateSectionController@deleteSectionModal');

Route::post('/teachermodal','TeacherListController@teachermodal');
Route::post('/studentmodal','StudentListController@studentmodal');
Route::post('/grademodal','GradeController@grademodal');
Route::post('/subjectmodal','CreateSubjectController@editSubject');
Route::post('/subjectmodal2','CreateSubjectController@editSubject2')->name('editSubject');
Route::post('/sectionmodal','CreateSectionController@editSection');
Route::post('/sectionmodal2','CreateSectionController@editSection2')->name('editSection');

Route::get('/magic','MagicController@magic')->name('magic');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

