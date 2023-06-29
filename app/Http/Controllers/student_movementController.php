<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\department;
use App\Models\placement_request;
use App\Models\Instructor;


class student_movementController extends Controller
{
    public function search(Request $request)
    {
           


       // $students = student::where('Badge', 'LIKE', '%'. $request->badge. '%')->pluck('Badge');
 

        $students = student::where($request->searchBy , 'LIKE', '%'. $request->badge. '%')->paginate(5);
        return view('Admins.ExaminationDepartment.views.Students.StudentsMovement' , compact('students'));
    }


    public function index_StudentsMovementAction(Request $request)
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');

        $student_id = $request->id;
        $departments = Department::where('college_id', $College_id)->paginate(5);
        return view('Admins.ExaminationDepartment.views.Students.MovementActions' , compact('departments','student_id'));
    }


    public function MoveAction(Request $request)
    {
     
        $current_department = student::where('id',$request->student_id)->value('department_id');

        student::where('id', $request->student_id)
        ->update([
            'department_id' => $request->newDepId,
            'old_department_id' => $current_department,
            
         ]);

        $x =  placement_request::where('student_id', $request->student_id)->delete();
         
        return back()->with('message', 'تم نقل الطالب بنجاح ');;
    }

}
