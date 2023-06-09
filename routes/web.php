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
 Route::get('/reg', 'App\Http\Controllers\InstrController@students')->name('registerTest');;

 Route::group(['middleware' => ['role:college']], function() {
 

Route::get('/test', 'App\Http\Controllers\ExaminationController@index')->name('test');;

Route::get('/Departments', 'App\Http\Controllers\ExaminationController@index_DepartmetsMenu')->name('DepartmentsMenu');
Route::get('/DepartmentsInfo', 'App\Http\Controllers\ExaminationController@index_DepartmentsInfo')->name('DepartmentsInfo');
Route::post('/DepartmentsUpdate', 'App\Http\Controllers\ExaminationController@Update_DepartmentsInfo')->name('DepartmentsUpdate');
Route::get('/NewDepartments', 'App\Http\Controllers\ExaminationController@New_Departments')->name('NewDepartments');
Route::post('/AddDepartments', 'App\Http\Controllers\ExaminationController@Add_Departments')->name('AddDepartments');

Route::get('/DepartmentsDelete', 'App\Http\Controllers\ExaminationController@index_DepartmetsDelete')->name('DepartmentsDelete');
Route::get('/DepartmentsDeleteAction', 'App\Http\Controllers\ExaminationController@delete_Departments')->name('DepartmentsDeleteAction');


Route::get('/Semesters', 'App\Http\Controllers\ExaminationController@index_SemestersMenu')->name('SemestersMenu');
Route::get('/CurrentSemesterActivate', 'App\Http\Controllers\ExaminationController@CurrentSemesterActivate')->name('CurrentSemesterActivate');


Route::get('/NewSemester', 'App\Http\Controllers\ExaminationController@index_NewSemester')->name('NewSemester');
Route::post('/AddSemesters', 'App\Http\Controllers\ExaminationController@add_Semester')->name('AddSemesters');
Route::get('/SemestersDeleteAction', 'App\Http\Controllers\ExaminationController@delete_Semester')->name('SemestersDeleteAction');


Route::get('/Request', 'App\Http\Controllers\ExaminationController@index_Override')->name('Request');
Route::get('/OverrideRequestAccept', 'App\Http\Controllers\OverrideActionsController@Override_Accept')->name('OverrideRequestAccept');
Route::get('/OverrideRequestDeny', 'App\Http\Controllers\OverrideActionsController@Override_Denied')->name('OverrideRequestDeny');




Route::get('/FinalResults', 'App\Http\Controllers\ExaminationController@index_FinalResults')->name('FinalResults');
Route::get('/GetSemestersPlan', 'App\Http\Controllers\ExaminationController@index_SemestersPlan')->name('GetSemestersPlan');
Route::get('/createSemesterPlan', 'App\Http\Controllers\ExaminationController@create_SemesterPlan')->name('createSemesterPlan');

Route::post('/SetSemestersPlan', 'App\Http\Controllers\ExaminationController@set_SemestersPlan')->name('SetSemestersPlan');

Route::get('/StudentsPlacement', 'App\Http\Controllers\ExaminationController@index_StudentsPlacement')->name('StudentsPlacement');


Route::get('/StudentsMovement', 'App\Http\Controllers\ExaminationController@index_StudentsMovement')->name('StudentsMovement');
Route::post('/StudentsMovementSearch', 'App\Http\Controllers\student_movementController@search')->name('StudentsMovementSearch');
Route::get('/StudentsMovementAction', 'App\Http\Controllers\student_movementController@index_StudentsMovementAction')->name('StudentsMovementAction');
Route::get('/StudentsMovementActionDone', 'App\Http\Controllers\student_movementController@MoveAction')->name('StudentsMovementActionDone');


Route::get('/RegRenewal', 'App\Http\Controllers\ExaminationController@index_RegRenewal')->name('RegRenewal');
Route::post('/StudentsRenewalSearch', 'App\Http\Controllers\regRenewalController@search_renewal')->name('StudentsRenewalSearch');
Route::get('/RegRenewalIntermettent', 'App\Http\Controllers\regRenewalController@show_inter')->name('RegRenewalIntermettent');
Route::get('/RenewalComplete', 'App\Http\Controllers\regRenewalController@action_complete')->name('RenewalComplete');
Route::get('/RenewalCancel', 'App\Http\Controllers\regRenewalController@action_cancel')->name('RenewalCancel');
Route::get('/RenewalStop', 'App\Http\Controllers\regRenewalController@action_stop')->name('RenewalStop');


Route::get('/Rooms', 'App\Http\Controllers\ExaminationController@index_Rooms')->name('Rooms');;

Route::post('/RoomsActionAdd', 'App\Http\Controllers\RoomsController@add_Room')->name('RoomsActionAdd');;
Route::get('/RoomsActionRemove', 'App\Http\Controllers\RoomsController@Remove_Room')->name('RoomsActionRemove');;
Route::POST('/RoomsDepartment', 'App\Http\Controllers\RoomsController@Search_Rooms')->name('RoomsDepartment');;



Route::get('/StopEnrollment', 'App\Http\Controllers\ExaminationController@index_StopEnrollment')->name('StopEnrollment');

Route::get('/StudentNotify', 'App\Http\Controllers\ExaminationController@index_StudentNotify')->name('StudentNotify');
//////////////////////////////////////////////////////////////////

Route::post('/NotifyStudent', 'App\Http\Controllers\NotificationsController@action_NotifyStudent')->name('NotifyStudent');

 
    //Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
});


Route::group(['middleware' => ['role:instructor']], function() {
    Route::get('/inst', 'App\Http\Controllers\InstrController@index')->name('inst');

//----------  HEAD OF DEPARTMENT
Route::get('/facultyMembers', 'App\Http\Controllers\InstrController@index_facultyMembers')->name('FacultyMembers');
Route::get('/InstructorProfile', 'App\Http\Controllers\Instructors\InstructorsMenuController@profile_instructor')->name('InstructorProfile');

Route::post('/InstructorSearch', 'App\Http\Controllers\Instructors\InstructorsMenuController@search_instructor')->name('InstructorSearch');




Route::get('/SemestersPlanShow', 'App\Http\Controllers\InstrController@index_SemestersPlan')->name('SemestersPlanB');

Route::get('/StudentsMenu', 'App\Http\Controllers\InstrController@index_StudentsMenu')->name('StudentsMenu');;
Route::get('/StudentsProfile', 'App\Http\Controllers\Instructors\StudentsController@index_Profile')->name('StudentsProfile');;
Route::get('/ActiveStudents', 'App\Http\Controllers\Instructors\StudentsController@Active_Students')->name('ActiveStudents');;
Route::get('/notActiveStudents', 'App\Http\Controllers\Instructors\StudentsController@notActive_Students')->name('notActiveStudents');;
Route::post('/SearchStudent', 'App\Http\Controllers\Instructors\StudentsController@search_student')->name('SearchStudent');;





Route::get('/Dropped', 'App\Http\Controllers\InstrController@index_Dropped')->name('Dropped');;
Route::get('/NewStudents', 'App\Http\Controllers\InstrController@index_NewStudents')->name('NewStudents');;
 
Route::get('/Complaints', 'App\Http\Controllers\InstrController@index_Complaints')->name('Complaints');;


Route::get('/Stats', 'App\Http\Controllers\Instructors\StatsController@index')->name('Stats');;
Route::get('/StudentsStats', 'App\Http\Controllers\Instructors\StatsController@students')->name('StudentsStats');;
Route::post('/StudentsStatsActionSemester', 'App\Http\Controllers\Instructors\StatsController@students_ActionSemester')->name('StudentsStatsActionSemester');;



// EXAM Coordinator

Route::get('/Subjects', 'App\Http\Controllers\InstrController@index_SubjectsMenu')->name('SubjectsMenu');;
Route::get('/SubjectsDetails', 'App\Http\Controllers\InstrController@index_SubjectDetails')->name('SubjectsDetails');;

Route::get('/NewSubject', 'App\Http\Controllers\InstrController@index_NewSubject')->name('NewSubject');
Route::POST('/ActionInsertNewSubject', 'App\Http\Controllers\Instructors\SubjectsController@insert_newSubject')->name('ActionInsertNewSubject');
Route::POST('/ActionUpdateSubject', 'App\Http\Controllers\Instructors\SubjectsController@Update_Subject')->name('ActionUpdateSubject');

Route::get('/ActionDeleteSubject', 'App\Http\Controllers\Instructors\SubjectsController@Delete_Subject')->name('ActionDeleteSubject');
Route::get('/ActionDeleteSubjectRequiremet', 'App\Http\Controllers\Instructors\SubjectsController@Delete_SubjectRequiremet')->name('ActionDeleteSubjectRequiremet');
Route::POST('/ActionInsertNewSubjectRequiremet', 'App\Http\Controllers\Instructors\SubjectsController@insert_newSubjectRequiremet')->name('ActionInsertNewSubjectRequiremet');

Route::get('/ActionActiveSubject', 'App\Http\Controllers\Instructors\SubjectsController@Active_SubjectAction')->name('ActionActiveSubject');




Route::get('/Supervision', 'App\Http\Controllers\InstrController@index_Supervision')->name('Supervision');
Route::post('/SupervisorUpdateAction', 'App\Http\Controllers\Instructors\StudentsController@SupervisorUpdateAction')->name('SupervisorUpdateAction');
Route::post('/SupervisorSearch', 'App\Http\Controllers\Instructors\StudentsController@Supervisor_Search')->name('SupervisorSearch');


Route::get('/OverrideRequest', 'App\Http\Controllers\InstrController@index_OverrideRequest')->name('OverrideRequest');;
Route::post('/OverrideRequestAction', 'App\Http\Controllers\Instructors\StudentsController@OverrideRequest')->name('OverrideRequestAction');;


Route::get('/ClassTable', 'App\Http\Controllers\InstrController@index_ClassTable')->name('ClassTable');;
Route::get('/ClassTableEdit', 'App\Http\Controllers\InstrController@index_ClassTableEdit')->name('ClassTableEdit');;
Route::get('/DayToBeEdited', 'App\Http\Controllers\InstrController@index_DayToBeEdited')->name('DayToBeEdited');;

Route::get('/CreateClassTable', 'App\Http\Controllers\Instructors\SubjectsController@CreateClassTable')->name('CreateClassTable');;
Route::post('/ClassTableEditAction', 'App\Http\Controllers\Instructors\SubjectsController@ClassTableEditAction')->name('ClassTableEditAction');;

Route::get('/ExamsTable', 'App\Http\Controllers\InstrController@index_ExamsTable')->name('ExamsTable');;
Route::post('/ExamsTableEditAction', 'App\Http\Controllers\Instructors\SubjectsController@ExamsTableEditAction')->name('ExamsTableEditAction');;
Route::get('/EditExamsTable', 'App\Http\Controllers\InstrController@index_EditExamsTable')->name('EditExamsTable');;
Route::get('/EditExamsTableActionFirst', 'App\Http\Controllers\Instructors\SubjectsController@EditExamsTableActionFirst')->name('EditExamsTableActionFirst');;
Route::get('/EditExamsTableActionSecond', 'App\Http\Controllers\Instructors\SubjectsController@EditExamsTableActionSecond')->name('EditExamsTableActionSecond');;
Route::get('/EditExamsTableActionDelete', 'App\Http\Controllers\Instructors\SubjectsController@EditExamsTableActionDelete')->name('EditExamsTableActionDelete');;




 // PROFESSORS

 Route::get('/SubjectsList', 'App\Http\Controllers\InstrController@index_SubjectsList')->name('SubjectsList');;
 Route::get('/marksRecord', 'App\Http\Controllers\Instructors\SubjectsController@marksRecord')->name('marksRecord');;
 Route::post('/marksRecordAction', 'App\Http\Controllers\Instructors\SubjectsController@marksRecordAction')->name('marksRecordAction');;

 Route::get('/attendanceRecord', 'App\Http\Controllers\Instructors\SubjectsController@attendanceRecord')->name('attendanceRecord');;
 Route::get('/attendanceEdit', 'App\Http\Controllers\Instructors\SubjectsController@attendance_EditRecord')->name('attendanceEdit');;
 
 
 Route::get('/AttendanceRecordAction', 'App\Http\Controllers\Instructors\SubjectsController@AttendanceRecordAction')->name('AttendanceRecordAction');;
 Route::get('/AttendanceRecordActionUpdate', 'App\Http\Controllers\Instructors\SubjectsController@AttendanceRecordAction_Update')->name('AttendanceRecordActionUpdate');;
 

 Route::post('/AttendanceSearch', 'App\Http\Controllers\Instructors\SubjectsController@Attendance_Search')->name('AttendanceSearch');;
 
 
 Route::get('/examsDate', 'App\Http\Controllers\Instructors\SubjectsController@examsDate')->name('examsDate');;
 Route::post('/examsDateInsert', 'App\Http\Controllers\Instructors\SubjectsController@examsDateAction_Insert')->name('examsDateInsert');;
 Route::get('/examsDateDelete', 'App\Http\Controllers\Instructors\SubjectsController@examsDateAction_Delete')->name('examsDateDelete');;
 
 
 Route::get('/Model2Template', 'App\Http\Controllers\ModelsController@Model2TemplatePrint')->name('Model2Template');;
 
 
 Route::get('/SupervisionList', 'App\Http\Controllers\InstrController@index_SupervisionList')->name('SupervisionList');;


 Route::get('/DroppedPaln', 'App\Http\Controllers\InstrController@index_DroppedPaln')->name('DroppedPaln');;

 Route::get('/StudentNotofyAlert', 'App\Http\Controllers\Instructors\StudentsController@StudentNotofyAlert')->name('StudentNotofyAlert');;
 

 Route::post('/StudentNotofyAlertAction', 'App\Http\Controllers\Instructors\StudentsController@StudentNotofyAlertAction')->name('StudentNotofyAlertAction');;
 

 
        //Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
    });
    
    Route::group(['middleware' => ['role:student']], function() {
        Route::get('/studentDashboard', 'App\Http\Controllers\students\StudentController@index')->name('studentDashboard');
        Route::get('/CurrentSemesterSubjects', 'App\Http\Controllers\students\StudentController@show_currentSemSubs')->name('currentSemSubs');
       
        Route::get('/EditSubjects', 'App\Http\Controllers\students\StudentController@show_EditSubjects')->name('EditSubjects');
        Route::post('/AddSubject', 'App\Http\Controllers\students\StudentController@AddSubject')->name('AddSubject');
        Route::get('/DropSubject', 'App\Http\Controllers\students\StudentController@DropSubject')->name('DropSubject');
        
        
        Route::get('/NotifyMenu', 'App\Http\Controllers\students\StudentController@show_NotifyMenu')->name('NotifyMenu');
        Route::get('/ShowNotificationMessage', 'App\Http\Controllers\students\StudentController@ShowNotificationMessage')->name('ShowNotificationMessage');
       
        Route::get('/RequirementsMenu', 'App\Http\Controllers\students\StudentController@RequirementsMenu')->name('RequirementsMenu');
      
          
        Route::get('/SemestersPlan', 'App\Http\Controllers\students\StudentController@SemestersPlan')->name('CurrentSemestersPlan');

        
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
