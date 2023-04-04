<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstrController extends Controller
{
    public function index()
    {
        return view('instructors._main');
    }


    public function index_facultyMembers()
    {
        return view('instructors.HOD.FacultyMembers');
    }
    
    public function index_SemestersPlan()
    {
        return view('instructors.HOD.SemestersPlan');
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
