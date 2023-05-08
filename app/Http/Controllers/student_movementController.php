<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\Department;
class student_movementController extends Controller
{
    public function search(Request $request)
    {

        $students = student::all()->where('badge' , $request->badge);
        return view('Admins.ExaminationDepartment.views.Students.StudentsMovement' , compact('students'));
    }


    public function index_StudentsMovementAction(Request $request)
    {

        $student_id = $request->id;
        $departments = Department::all();
        return view('Admins.ExaminationDepartment.views.Students.MovementActions' , compact('departments','student_id'));
    }


    public function MoveAction(Request $request)
    {
  
        student::where('id', $request->student_id)
        ->update([
            'department_id' => $request->newDepId
         ]);

        return back()->with('message', 'تم نقل الطالب بنجاح ');;
    }

}
