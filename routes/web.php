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


 Route::group(['middleware' => ['role:Admin']], function() {

    Route::get('/Dashboard', 'App\Http\Controllers\SystemAdmin\mainController@index')->name('AdminDashboard');;

    /// ---- COLLEGES 
        
    Route::get('/Colleges', 'App\Http\Controllers\SystemAdmin\mainController@CollegesMenu')->name('CollegesMenu');
    Route::get('/CollegeInfo', 'App\Http\Controllers\SystemAdmin\mainController@CollegeInfo')->name('CollegeInfo');
    Route::post('/CollegeUpdate', 'App\Http\Controllers\SystemAdmin\mainController@Update_CollegeInfo')->name('CollegeUpdate');
    Route::get('/CollegeDean', 'App\Http\Controllers\SystemAdmin\mainController@CollegeDean')->name('CollegeDean');
    Route::get('/set_CollegeDean', 'App\Http\Controllers\SystemAdmin\mainController@set_CollegeDean')->name('set_CollegeDean');
    Route::post('/serach_CollegeDean', 'App\Http\Controllers\SystemAdmin\mainController@serach_CollegeDean')->name('serach_CollegeDean');
    Route::get('/NewCollege', 'App\Http\Controllers\SystemAdmin\mainController@New_College')->name('NewCollege');
    Route::post('/NewCollegeActionAdd', 'App\Http\Controllers\SystemAdmin\mainController@NewCollegeActionAdd')->name('NewCollegeActionAdd');
   
    

    
 });




 ///////////////////////////////////////////////////////////////////
 Route::get('/reg', 'App\Http\Controllers\InstrController@students')->name('registerTest');;

 Route::group(['middleware' => ['role:college|instructor']], function() {


  //////////////////////////// AUTO COMPLETE TYPEAHEAD  ////////////////////////////
  Route::get('/autocomplete-search', 'App\Http\Controllers\typeaheadController@autocompleteSearch');

  Route::get('/Movement_autocomplete-search', 'App\Http\Controllers\typeaheadController@Movement_autocompleteSearch');
  Route::get('/Department_autocomplete-search', 'App\Http\Controllers\typeaheadController@department_autocompleteSearch');


  
 });

 Route::group(['middleware' => ['role:college']], function() {


 //////////////////////////// //////////////////////////// ////////////////////////////




Route::get('/test', 'App\Http\Controllers\ExaminationController@index')->name('test');

Route::get('/Departments', 'App\Http\Controllers\ExaminationController@index_DepartmetsMenu')->name('DepartmentsMenu');
Route::get('/DepartmentsInfo', 'App\Http\Controllers\ExaminationController@index_DepartmentsInfo')->name('DepartmentsInfo');
Route::post('/DepartmentsUpdate', 'App\Http\Controllers\ExaminationController@Update_DepartmentsInfo')->name('DepartmentsUpdate');
Route::get('/NewDepartments', 'App\Http\Controllers\ExaminationController@New_Departments')->name('NewDepartments');
Route::post('/AddDepartments', 'App\Http\Controllers\ExaminationController@Add_Departments')->name('AddDepartments');

Route::get('/DepartmentsDelete', 'App\Http\Controllers\ExaminationController@index_DepartmetsDelete')->name('DepartmentsDelete');
Route::delete('/DepartmentsDeleteAction', 'App\Http\Controllers\ExaminationController@delete_Departments')->name('DepartmentsDeleteAction');


Route::get('/Semesters', 'App\Http\Controllers\ExaminationController@index_SemestersMenu')->name('SemestersMenu');
Route::post('/CurrentSemesterActivate', 'App\Http\Controllers\ExaminationController@CurrentSemesterActivate')->name('CurrentSemesterActivate');


Route::get('/NewSemester', 'App\Http\Controllers\ExaminationController@index_NewSemester')->name('NewSemester');
Route::post('/AddSemesters', 'App\Http\Controllers\ExaminationController@add_Semester')->name('AddSemesters');
Route::delete('/SemestersDeleteAction', 'App\Http\Controllers\ExaminationController@delete_Semester')->name('SemestersDeleteAction');


Route::get('/Request', 'App\Http\Controllers\ExaminationController@index_Override')->name('Request');
Route::get('/OverrideRequestAccept', 'App\Http\Controllers\OverrideActionsController@Override_Accept')->name('OverrideRequestAccept');
Route::get('/OverrideRequestDeny', 'App\Http\Controllers\OverrideActionsController@Override_Denied')->name('OverrideRequestDeny');




Route::get('/FinalResults', 'App\Http\Controllers\ExaminationController@index_FinalResults')->name('FinalResults');
Route::get('/GetSemestersPlan', 'App\Http\Controllers\ExaminationController@index_SemestersPlan')->name('GetSemestersPlan');
Route::get('/createSemesterPlan', 'App\Http\Controllers\ExaminationController@create_SemesterPlan')->name('createSemesterPlan');

Route::post('/SetSemestersPlan', 'App\Http\Controllers\ExaminationController@set_SemestersPlan')->name('SetSemestersPlan');


Route::get('/StudentAccount', 'App\Http\Controllers\ExaminationController@index_StudentAccount')->name('StudentAccount');
Route::post('/CreateStudentAccount', 'App\Http\Controllers\ExaminationController@index_CreateStudentAccount')->name('CreateStudentAccount');


Route::get('/StudentsPlacement', 'App\Http\Controllers\ExaminationController@index_StudentsPlacement')->name('StudentsPlacement');


Route::get('/StudentsMovement', 'App\Http\Controllers\ExaminationController@index_StudentsMovement')->name('StudentsMovement');
Route::post('/StudentsMovementSearch', 'App\Http\Controllers\student_movementController@search')->name('StudentsMovementSearch');
Route::get('/StudentsMovementAction', 'App\Http\Controllers\student_movementController@index_StudentsMovementAction')->name('StudentsMovementAction');
Route::get('/StudentsMovementActionDone', 'App\Http\Controllers\student_movementController@MoveAction')->name('StudentsMovementActionDone');


Route::get('/RegRenewal', 'App\Http\Controllers\ExaminationController@index_RegRenewal')->name('RegRenewal');
Route::post('/StudentsRenewalSearch', 'App\Http\Controllers\regRenewalController@search_renewal')->name('StudentsRenewalSearch');
Route::get('/RegRenewalIntermettent', 'App\Http\Controllers\regRenewalController@show_inter')->name('RegRenewalIntermettent');
Route::get('/RegRenewalStopped', 'App\Http\Controllers\regRenewalController@show_stopped')->name('RegRenewalStopped');


Route::get('/RenewalComplete', 'App\Http\Controllers\regRenewalController@action_complete')->name('RenewalComplete');
Route::get('/RenewalCancel', 'App\Http\Controllers\regRenewalController@action_cancel')->name('RenewalCancel');
Route::get('/RenewalStop', 'App\Http\Controllers\regRenewalController@action_stop')->name('RenewalStop');


Route::get('/Rooms', 'App\Http\Controllers\ExaminationController@index_Rooms')->name('Rooms');;

Route::post('/RoomsActionAdd', 'App\Http\Controllers\RoomsController@add_Room')->name('RoomsActionAdd');;
Route::delete('/RoomsActionRemove', 'App\Http\Controllers\RoomsController@Remove_Room')->name('RoomsActionRemove');;
Route::POST('/RoomsDepartment', 'App\Http\Controllers\RoomsController@Search_Rooms')->name('RoomsDepartment');;



Route::get('/StopEnrollment', 'App\Http\Controllers\ExaminationController@index_StopEnrollment')->name('StopEnrollment');

Route::get('/StudentNotify', 'App\Http\Controllers\ExaminationController@index_StudentNotify')->name('StudentNotify');
//////////////////////////////////////////////////////////////////

Route::post('/NotifyStudent', 'App\Http\Controllers\NotificationsController@action_NotifyStudent')->name('NotifyStudent');

 ///////////////////PERMESSIONS////////////////////////////////

Route::get('/StudentDropAndAdd', 'App\Http\Controllers\ExaminationController@index_StudentDropAndAdd')->name('StudentDropAndAdd');
Route::get('/StudentDropAndAddActionAdd', 'App\Http\Controllers\ExaminationController@index_StudentAddAction')->name('StudentDropAndAddActionAdd');
Route::get('/StudentDropAndAddActionDrop', 'App\Http\Controllers\ExaminationController@index_StudentDropAction')->name('StudentDropAndAddActionDrop');
 
Route::get('/StudentDepartmentPlacement', 'App\Http\Controllers\ExaminationController@index_StudentDepartmentPlacement')->name('StudentDepartmentPlacement');
Route::get('/StudentDepartmentPlacementAction', 'App\Http\Controllers\ExaminationController@index_StudentDepartmentPlacementAction')->name('StudentDepartmentPlacementAction');
Route::post('/CollegeRequiredUnitsChangeAction', 'App\Http\Controllers\ExaminationController@CollegeRequiredUnitsChangeAction')->name('CollegeRequiredUnitsChangeAction');
 



Route::get('/FinalResultsReleaseAction', 'App\Http\Controllers\ExaminationController@FinalResultsReleaseAction')->name('FinalResultsReleaseAction');
 
    //Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
});

Route::group(['middleware' => ['role:instructor', 'permission:hod-read']], function() {

//----------  HEAD OF DEPARTMENT
Route::get('/facultyMembers', 'App\Http\Controllers\InstrController@index_facultyMembers')->name('FacultyMembers');
Route::get('/InstructorProfile', 'App\Http\Controllers\Instructors\InstructorsMenuController@profile_instructor')->name('InstructorProfile');

Route::post('/InstructorSearch', 'App\Http\Controllers\Instructors\InstructorsMenuController@search_instructor')->name('InstructorSearch');







Route::get('/Dropped', 'App\Http\Controllers\InstrController@index_Dropped')->name('Dropped');;
Route::get('/NewStudents', 'App\Http\Controllers\InstrController@index_NewStudents')->name('NewStudents');;
 
Route::get('/Complaints', 'App\Http\Controllers\InstrController@index_Complaints')->name('Complaints');;



});
Route::group(['middleware' => ['role:instructor', 'permission:dec-read|hod-read']], function() {



 
    Route::get('/StudentsMenu', 'App\Http\Controllers\InstrController@index_StudentsMenu')->name('StudentsMenu');;
    Route::get('/StudentsProfile', 'App\Http\Controllers\Instructors\StudentsController@index_Profile')->name('StudentsProfile');;
    Route::get('/ActiveStudents', 'App\Http\Controllers\Instructors\StudentsController@Active_Students')->name('ActiveStudents');;
    Route::get('/notActiveStudents', 'App\Http\Controllers\Instructors\StudentsController@notActive_Students')->name('notActiveStudents');;
    Route::post('/SearchStudent', 'App\Http\Controllers\Instructors\StudentsController@search_student')->name('SearchStudent');;
    

    Route::get('/Stats', 'App\Http\Controllers\Instructors\StatsController@index')->name('Stats');;
    Route::get('/StudentsStats', 'App\Http\Controllers\Instructors\StatsController@students')->name('StudentsStats');;
    Route::post('/StudentsStatsActionSemester', 'App\Http\Controllers\Instructors\StatsController@students_ActionSemester')->name('StudentsStatsActionSemester');;
  

});
Route::group(['middleware' => ['role:instructor', 'permission:dec-read']], function() {

// EXAM Coordinator

Route::get('/Subjects', 'App\Http\Controllers\InstrController@index_SubjectsMenu')->name('SubjectsMenu');;
Route::get('/SubjectsDetails', 'App\Http\Controllers\InstrController@index_SubjectDetails')->name('SubjectsDetails');;

Route::get('/NewSubject', 'App\Http\Controllers\InstrController@index_NewSubject')->name('NewSubject');
Route::POST('/ActionInsertNewSubject', 'App\Http\Controllers\Instructors\SubjectsController@insert_newSubject')->name('ActionInsertNewSubject');
Route::POST('/ActionUpdateSubject', 'App\Http\Controllers\Instructors\SubjectsController@Update_Subject')->name('ActionUpdateSubject');

Route::get('/SubjectsProfessor', 'App\Http\Controllers\InstrController@index_SubjectsProfessor')->name('SubjectsProfessor');
Route::POST('/SubjectsProfessorAction', 'App\Http\Controllers\Instructors\SubjectsController@Update_SubjectProfessor')->name('SubjectsProfessorAction');


Route::delete('/ActionDeleteSubject', 'App\Http\Controllers\Instructors\SubjectsController@Delete_Subject')->name('ActionDeleteSubject');
Route::get('/ActionDeleteSubjectRequiremet', 'App\Http\Controllers\Instructors\SubjectsController@Delete_SubjectRequiremet')->name('ActionDeleteSubjectRequiremet');
Route::POST('/ActionInsertNewSubjectRequiremet', 'App\Http\Controllers\Instructors\SubjectsController@insert_newSubjectRequiremet')->name('ActionInsertNewSubjectRequiremet');

Route::get('/ActionActiveSubject', 'App\Http\Controllers\Instructors\SubjectsController@Active_SubjectAction')->name('ActionActiveSubject');




Route::get('/Supervision', 'App\Http\Controllers\InstrController@index_Supervision')->name('Supervision');
Route::post('/SupervisorUpdateAction', 'App\Http\Controllers\Instructors\StudentsController@SupervisorUpdateAction')->name('SupervisorUpdateAction');
Route::post('/SupervisorSearch', 'App\Http\Controllers\Instructors\StudentsController@Supervisor_Search')->name('SupervisorSearch');


Route::get('/OverrideRequest', 'App\Http\Controllers\InstrController@index_OverrideRequest')->name('OverrideRequest');;
Route::post('/OverrideRequestAction', 'App\Http\Controllers\Instructors\StudentsController@OverrideRequest')->name('OverrideRequestAction');;


Route::get('/TimeTable', 'App\Http\Controllers\InstrController@index_TimeTable')->name('TimeTable');;
Route::get('/TimeTableEdit', 'App\Http\Controllers\InstrController@index_TimeTableEdit')->name('TimeTableEdit');;

 Route::post('/TimeTableEditAction', 'App\Http\Controllers\Instructors\SubjectsController@TimeTableEditAction')->name('TimeTableEditAction');;
 
 Route::get('/TimeTableDeleteAction', 'App\Http\Controllers\Instructors\SubjectsController@TimeTableDeleteAction')->name('TimeTableDeleteAction');;
 
 Route::get('/TimeTableEditPeriod', 'App\Http\Controllers\InstrController@index_TimeTableEditPeriod')->name('TimeTableEditPeriod');;
 
 Route::post('/TimeTableEditPeriodAction', 'App\Http\Controllers\Instructors\SubjectsController@TimeTableEditPeriodAction')->name('TimeTableEditPeriodAction');;
 




Route::get('/ExamsTable', 'App\Http\Controllers\InstrController@index_ExamsTable')->name('ExamsTable');;
Route::post('/ExamsTableEditAction', 'App\Http\Controllers\Instructors\SubjectsController@ExamsTableEditAction')->name('ExamsTableEditAction');;
Route::get('/EditExamsTable', 'App\Http\Controllers\InstrController@index_EditExamsTable')->name('EditExamsTable');;
Route::get('/EditExamsTableActionFirst', 'App\Http\Controllers\Instructors\SubjectsController@EditExamsTableActionFirst')->name('EditExamsTableActionFirst');;
Route::get('/EditExamsTableActionSecond', 'App\Http\Controllers\Instructors\SubjectsController@EditExamsTableActionSecond')->name('EditExamsTableActionSecond');;
Route::get('/EditExamsTableActionDelete', 'App\Http\Controllers\Instructors\SubjectsController@EditExamsTableActionDelete')->name('EditExamsTableActionDelete');;

 

});

Route::group(['middleware' => ['role:instructor']], function() {
    Route::get('/inst', 'App\Http\Controllers\InstrController@index')->name('inst');



 // PROFESSORS
 Route::get('/SemestersPlanShow', 'App\Http\Controllers\InstrController@index_SemestersPlan')->name('SemestersPlanC');

 Route::get('/SubjectsList', 'App\Http\Controllers\InstrController@index_SubjectsList')->name('SubjectsList');;
 Route::get('/marksRecord', 'App\Http\Controllers\Instructors\SubjectsController@marksRecord')->name('marksRecord');;
 Route::get('/marksRecordEdit', 'App\Http\Controllers\Instructors\SubjectsController@marksRecordEdit')->name('marksRecordEdit');;


 
 Route::post('/marksRecordAction', 'App\Http\Controllers\Instructors\SubjectsController@marksRecordAction')->name('marksRecordAction');;

 Route::get('/NotifyEach', 'App\Http\Controllers\Instructors\SubjectsController@NotifyEach')->name('NotifyEach');;
 Route::post('/NotifyEachAction', 'App\Http\Controllers\Instructors\SubjectsController@NotifyEachAction')->name('NotifyEachAction');;


 
 Route::get('/attendanceRecord', 'App\Http\Controllers\Instructors\SubjectsController@attendanceRecord')->name('attendanceRecord');;
 Route::get('/attendanceEdit', 'App\Http\Controllers\Instructors\SubjectsController@attendance_EditRecord')->name('attendanceEdit');;
 Route::delete('/attendanceDelete', 'App\Http\Controllers\Instructors\SubjectsController@attendance_DeleteRecord')->name('attendanceDelete');;
 
 
 Route::get('/AttendanceRecordAction', 'App\Http\Controllers\Instructors\SubjectsController@AttendanceRecordAction')->name('AttendanceRecordAction');;
 Route::get('/AttendanceRecordActionUpdate', 'App\Http\Controllers\Instructors\SubjectsController@AttendanceRecordAction_Update')->name('AttendanceRecordActionUpdate');;
 

 Route::post('/AttendanceSearch', 'App\Http\Controllers\Instructors\SubjectsController@Attendance_Search')->name('AttendanceSearch');;
 Route::get('/AttendanceSheet', 'App\Http\Controllers\Instructors\SubjectsController@Attendance_sheet')->name('AttendanceSheet');;
 
 
 Route::get('/examsDate', 'App\Http\Controllers\Instructors\SubjectsController@examsDate')->name('examsDate');;
 Route::post('/examsDateInsert', 'App\Http\Controllers\Instructors\SubjectsController@examsDateAction_Insert')->name('examsDateInsert');;
 Route::get('/examsDateDelete', 'App\Http\Controllers\Instructors\SubjectsController@examsDateAction_Delete')->name('examsDateDelete');;
 
 
 Route::get('/Model2Template', 'App\Http\Controllers\modelsController@Model2TemplatePrint')->name('Model2Template');;
 
 
 Route::get('/SupervisionList', 'App\Http\Controllers\InstrController@index_SupervisionList')->name('SupervisionList');;


 Route::get('/DroppedPaln', 'App\Http\Controllers\InstrController@index_DroppedPaln')->name('DroppedPaln');;

 Route::get('/StudentNotofyAlert', 'App\Http\Controllers\Instructors\StudentsController@StudentNotofyAlert')->name('StudentNotofyAlert');;
 

 Route::post('/StudentNotofyAlertAction', 'App\Http\Controllers\Instructors\StudentsController@StudentNotofyAlertAction')->name('StudentNotofyAlertAction');;
 

 Route::get('/NotifyAll', 'App\Http\Controllers\Instructors\StudentsController@NotifyAll')->name('NotifyAll');;
 
 Route::post('/NotifyAllAction', 'App\Http\Controllers\Instructors\StudentsController@NotofyAllAction')->name('NotifyAllAction');;
 

 Route::get('/StudentsProfile', 'App\Http\Controllers\Instructors\StudentsController@index_Profile')->name('StudentsProfile');;

 
        //Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
    });
    
    Route::group(['middleware' => ['role:student']], function() {
        Route::get('/studentDashboard', 'App\Http\Controllers\Students\StudentController@index')->name('studentDashboard');
        Route::get('/studentProfile', 'App\Http\Controllers\Students\StudentController@profile')->name('studentProfile');
        Route::post('/EditProfile', 'App\Http\Controllers\Students\StudentController@profile_Edit')->name('EditProfile');
      
      
        
        Route::get('/CurrentSemesterSubjects', 'App\Http\Controllers\Students\StudentController@show_currentSemSubs')->name('currentSemSubs');
        Route::get('/OldSemesterSubjects', 'App\Http\Controllers\Students\StudentController@show_oldSemSubs')->name('oldSemSubs');
        Route::post('/OldSemesterSubjects', 'App\Http\Controllers\Students\StudentController@oldSemData')->name('getSemData');
       
        

        Route::get('/NotifyMenu', 'App\Http\Controllers\Students\StudentController@show_NotifyMenu')->name('NotifyMenu');
        Route::get('/ShowNotificationMessage', 'App\Http\Controllers\Students\StudentController@ShowNotificationMessage')->name('ShowNotificationMessage');
       
        Route::get('/RequirementsMenu', 'App\Http\Controllers\Students\StudentController@RequirementsMenu')->name('RequirementsMenu');
      
          
        Route::get('/SemestersPlan', 'App\Http\Controllers\Students\StudentController@SemestersPlan')->name('CurrentSemestersPlan');

        
    });

    Route::group(['middleware' => ['role:student', 'permission:subjects-delete']], function() {
    Route::get('/EditSubjects', 'App\Http\Controllers\Students\StudentController@show_EditSubjects')->name('EditSubjects');
    Route::post('/AddSubject', 'App\Http\Controllers\Students\StudentController@AddSubject')->name('AddSubject');
    Route::delete('/DropSubject', 'App\Http\Controllers\Students\StudentController@DropSubject')->name('DropSubject');
});
    
Route::group(['middleware' => ['role:student', 'permission:placements']], function() {
    Route::get('/PlacementApplication', 'App\Http\Controllers\Students\StudentController@show_PlacementApplication')->name('PlacementApplication');
    Route::post('/PlacementApplicationAction', 'App\Http\Controllers\Students\StudentController@PlacementApplicationAction')->name('PlacementApplicationAction');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
