<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\student_mark;
use App\Models\override_request;
 
use App\Models\College;
use Illuminate\Http\Request;

class OverrideActionsController extends Controller
{
    public function Override_Accept(Request $request)
    {

        
    
        $department_id = student::where('id',$request->student_id)->value('department_id');
      
        $College_id = student::where('id',$request->student_id)->value('college_id');

        $semester_id = College::where('id',$College_id)->value('current_semester');
      
    

        student_mark::insert(
            [
             'student_id' => $request->student_id,
             'subject_id' => $request->subject_id,

             'department_id' =>$department_id,
             'college_id' => $College_id,
             'semester_id' => $semester_id,

             'final' => '0',
             'work' => '0',
             
                
             ]
        );


        override_request::where('id',$request->request_id)->delete();
        return back()->with('Success_message', 'تم قبول الطلب');

    }


    public function Override_Denied(Request $request)
    {

   
        override_request::where('id',$request->request_id)->delete();
        return back()->with('Denied_message', 'تم رفض الطلب');

    }

}
