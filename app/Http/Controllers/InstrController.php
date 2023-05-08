<?php

namespace App\Http\Controllers;
use App\Models\Instructor;
use App\Models\City;
use App\Models\Department;
use App\Models\College;
use App\Models\semesterplan;
use App\Models\semester;


use Illuminate\Http\Request;

class InstrController extends Controller
{

    public function students()
    {
      
        $ids = City::all('name','id');
        $departments = Department::all('arabic_name','id');
        $colleges = College::all('arabic_name','id');
    
        return view ('auth.Testregister',  compact('ids' , 'departments' , 'colleges'));
 
 
    }
  
    public function index()
    {
        

        return view('instructors._main');
    }


    public function index_facultyMembers()
    {
        $user_id = auth()->user()->id;

        $user_College_id = Instructor::where('id',$user_id)->value('college_id');

        $user_department_id = Instructor::where('id',$user_id)->value('department_id');

        $instructors = Instructor::where('department_id',$user_department_id)->get();

        return view('instructors.HOD.FacultyMembers' , compact('instructors'));
    }
    
    public function index_SemestersPlan()
    {
        $user_id = auth()->user()->id;
        

        
        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $semester_id = College::where('id',$College_id)->value('current_semester');


        $semesterplan =  semesterplan::all()->where('college_id',$College_id)->where('semester_id' , $semester_id);
     $SEMESTER_NAME = Semester::where('id',$semester_id)->value('name');


        return view('instructors.HOD.SemestersPlan' , compact('semesterplan' , 'SEMESTER_NAME'));
    }

    public function index_StudentsMenu()
    {
        return view('instructors.HOD.StudentsMenu');
    }

    public function index_Dropped()
    {
        return view('instructors.HOD.DropedStudents');
    }
    
    public function index_NewStudents()
    {
        return view('instructors.HOD.NewStudents');
    }
    public function index_Complaints()
    {
        return view('instructors.HOD.StudentsComplaints');
    }

    public function index_ClassesList()
    {
        return view('instructors.HOD.ClassesList');
    }
    public function index_SubjectsMenu()
    {
        return view('instructors.DEC.SubjectsMenu');
    }
    public function index_SubjectDetails()
    {
        return view('instructors.DEC.SubjectDetails');
    }

    public function index_NewSubject()
    {
        return view('instructors.DEC.NewSubject');
    }

    public function index_Supervision()
    {
        return view('instructors.DEC.Supervision');
    }
    public function index_OverrideRequest()
    {
        return view('instructors.DEC.SubjectOverrideRequest');
    }
    public function index_ClassTable()
    {
        return view('instructors.DEC.ClassTable');
    }

    ///////////////////////////////////////

    public function index_SubjectsList()
    {
        return view('instructors.Professor.SubjectsList');
    }
    public function index_SupervisionList()
    {
        return view('instructors.Professor.SupervisionList');
    }
}
