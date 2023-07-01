<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student_mark;
use App\Models\student;
use App\Models\Instructor;
use App\Models\college;
use App\Models\subject;

class modelsController extends Controller
{
    //
    public function Model2TemplatePrint(Request $request)
    {


        $user_id = auth()->user()->id;
        

        
        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $current_semester = college::where('id',$College_id)->value('current_semester');
        $department_id = Instructor::where('id',$user_id)->value('department_id');
       

        $studentData =  student::where('id',$request->student_id)->where('department_id',$department_id)->get();
        $studentSubjects =  student_mark::where('student_id',$request->student_id)->where('semester_id',$current_semester)->get();
  
  
        $unitsCount = 0;
        foreach ($studentSubjects as $subs ){
          $units = subject::where('id',$subs->subject_id)->value('units');
          $unitsCount += $units;
        }
          $student_id = $request->student_id;
        return view('instructors.Professor.Model2template' , compact('studentData' , 'studentSubjects' , 'unitsCount' , 'student_id'));
         
    }
}
