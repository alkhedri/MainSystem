<?php

use Illuminate\Support\Facades\Route;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

 ///////////////////////////////////////////////////////////////////
Route::get('/test', 'App\Http\Controllers\ExaminationController@index')->name('test');;

Route::get('/Departments', 'App\Http\Controllers\ExaminationController@index_DepartmetsMenu')->name('DepartmentsMenu');
Route::get('/DepartmentsInfo', 'App\Http\Controllers\ExaminationController@index_DepartmentsInfo')->name('DepartmentsInfo');
Route::get('/DepartmentsDelete', 'App\Http\Controllers\ExaminationController@index_DepartmetsDelete')->name('DepartmentsDelete');


Route::get('/Semesters', 'App\Http\Controllers\ExaminationController@index_SemestersMenu')->name('SemestersMenu');
Route::get('/NewSemester', 'App\Http\Controllers\ExaminationController@index_NewSemester')->name('NewSemester');
Route::get('/Request', 'App\Http\Controllers\ExaminationController@index_Override')->name('Request');
Route::get('/FinalResults', 'App\Http\Controllers\ExaminationController@index_FinalResults')->name('FinalResults');
Route::get('/SemestersPlan', 'App\Http\Controllers\ExaminationController@index_SemestersPlan')->name('SemestersPlan');

Route::get('/StudentsPlacement', 'App\Http\Controllers\ExaminationController@index_StudentsPlacement')->name('StudentsPlacement');
Route::get('/StudentsMovement', 'App\Http\Controllers\ExaminationController@index_StudentsMovement')->name('StudentsMovement');
Route::get('/RegRenewal', 'App\Http\Controllers\ExaminationController@index_RegRenewal')->name('RegRenewal');
Route::get('/StopEnrollment', 'App\Http\Controllers\ExaminationController@index_StopEnrollment')->name('StopEnrollment');
//////////////////////////////////////////////////////////////////
Route::get('/inst', 'App\Http\Controllers\InstrController@index')->name('inst');;

//HEAD OF DEPARTMENT
Route::get('/facultyMembers', 'App\Http\Controllers\InstrController@index_facultyMembers')->name('FacultyMembers');;
Route::get('/SemestersPlanB', 'App\Http\Controllers\InstrController@index_SemestersPlan')->name('SemestersPlanB');;

Route::get('/StudentsMenu', 'App\Http\Controllers\InstrController@index_StudentsMenu')->name('StudentsMenu');;

Route::get('/Dropped', 'App\Http\Controllers\InstrController@index_Dropped')->name('Dropped');;
Route::get('/NewStudents', 'App\Http\Controllers\InstrController@index_NewStudents')->name('NewStudents');;
Route::get('/Classes', 'App\Http\Controllers\InstrController@index_ClassesList')->name('ClassesList');;

Route::get('/Complaints', 'App\Http\Controllers\InstrController@index_Complaints')->name('Complaints');;

// EXAM Coordinator

Route::get('/Subjects', 'App\Http\Controllers\InstrController@index_SubjectsMenu')->name('SubjectsMenu');;
Route::get('/SubjectDetails', 'App\Http\Controllers\InstrController@index_SubjectDetails')->name('SubjectDetails');;
Route::get('/NewSubject', 'App\Http\Controllers\InstrController@index_NewSubject')->name('NewSubject');;

Route::get('/Supervision', 'App\Http\Controllers\InstrController@index_Supervision')->name('Supervision');;
Route::get('/OverrideRequest', 'App\Http\Controllers\InstrController@index_OverrideRequest')->name('OverrideRequest');;
Route::get('/ClassTable', 'App\Http\Controllers\InstrController@index_ClassTable')->name('ClassTable');;

 // PROFESSORS

 Route::get('/SubjectsList', 'App\Http\Controllers\InstrController@index_SubjectsList')->name('SubjectsList');;
 Route::get('/SupervisionList', 'App\Http\Controllers\InstrController@index_SupervisionList')->name('SupervisionList');;




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
