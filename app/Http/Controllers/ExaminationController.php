<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    public function index()
    {
        return view('Admins.ExaminationDepartment.views._main');
    }


    public function index_DepartmetsMenu()
    {
        return view('Admins.ExaminationDepartment.views.Departments.Menu');
    }
    public function index_DepartmentsInfo()
    {
        return view('Admins.ExaminationDepartment.views.Departments.Info');
    }

    public function index_DepartmetsDelete()
    {
        return view('Admins.ExaminationDepartment.views.Departments.Delete');
    }


    //// Semesters Methods
    public function index_SemestersMenu()
    {
        return view('Admins.ExaminationDepartment.views.Semesters.Menu');
    }
    public function index_NewSemester()
    {
        return view('Admins.ExaminationDepartment.views.Semesters.NewSemester');
    }



    public function index_Override()
    {
        return view('Admins.ExaminationDepartment.views.Semesters.OverrideRequest');
    }

    public function index_FinalResults()
    {
        return view('Admins.ExaminationDepartment.views.Semesters.FinalResults');
    }

    public function index_SemestersPlan()
    {
        return view('Admins.ExaminationDepartment.views.Semesters.SemestersPlan');
    }




    // students
    public function index_StudentsPlacement()
    {
        return view('Admins.ExaminationDepartment.views.Students.StudentsPlacement');
    }
    public function index_StudentsMovement()
    {
        return view('Admins.ExaminationDepartment.views.Students.StudentsMovement');
    }
    public function index_RegRenewal()
    {
        return view('Admins.ExaminationDepartment.views.Students.RegRenewal');
    }
    public function index_StopEnrollment()
    {
        return view('Admins.ExaminationDepartment.views.Students.StopEnrollment');
    }
}
