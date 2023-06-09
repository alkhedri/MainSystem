<?php

namespace App\Http\Controllers\instructors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student;
use App\Models\Instructor;
use App\Models\student_mark;
use App\Models\college;
use App\Models\student_warning;
use App\Models\warning;
use App\Models\override_request;
use App\Models\subject;
use App\Models\notification;



class StudentsController extends Controller
{
    //
    public function search_student(Request $request)
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $department_id = Instructor::where('id',$user_id)->value('department_id');

        
        $students =  student::where('college_id',$College_id)->where('department_id' , $department_id)->where($request->searchBy, 'like', '%' . $request->student_name . '%')->paginate(5);;
 
        $count = $students->count();
        return view('instructors.HOD.StudentsMenu' , compact('students' , 'count'));
         
    }


    public function index_Profile(Request $request)
    {
        $user_id = auth()->user()->id;
        $department_id = Instructor::where('id',$user_id)->value('department_id');
      
        $profile = student::where('id', $request->id)->where('department_id', $department_id)->get();


        $user_id = auth()->user()->id;
        $College_id = Instructor::where('id',$user_id)->value('college_id');

        $current_Semester = college::where('id',$College_id)->value('current_semester');

        $Students_Subjects = student_mark::where('student_id', $request->id)->where('semester_id', $current_Semester)->pluck('subject_id');
        $Students_warnings = student_warning::where('student_id', $request->id)->pluck('warning_id');
        $student_arabic_name = student::where('id', $request->id)->where('department_id', $department_id)->value('arabic_name');

        
        return view('instructors.HOD.StudentProfile' , compact('profile' , 'Students_Subjects' , 'Students_warnings' , 'student_arabic_name'));
    }

    public function Active_Students()
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $department_id = Instructor::where('id',$user_id)->value('department_id');
    

        $students =  student::where('college_id',$College_id)->where('department_id' , $department_id)->where('enrollment_status_id' , 1)->paginate(5);;
   
        $count = $students->count();
        return view('instructors.HOD.StudentsMenu' , compact('students' , 'count'));
    }

    public function notActive_Students()
    {
        $user_id = auth()->user()->id;

        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $department_id = Instructor::where('id',$user_id)->value('department_id');
    

        $students =  student::where('college_id',$College_id)->where('department_id' , $department_id)->where('enrollment_status_id' , 3)->paginate(5);;
   
        $count = $students->count();
        return view('instructors.HOD.StudentsMenu' , compact('students' , 'count'));
    }



    public function StudentsWarnings(){


    }

    public function SupervisorUpdateAction(Request $request)
    {
        $user_id = auth()->user()->id;
 
        $department_id = Instructor::where('id',$user_id)->value('department_id');
    
 
        student::where('id', $request->id)->where('department_id' , $department_id)
        ->update([
            'spv_id' => $request->spvid,
         ]);


         return redirect()->route('Supervision');
    
    }

    public function Supervisor_Search(Request $request)
    {
 
        $user_id = auth()->user()->id;
        $department_id = instructor::where('id',$user_id)->value('department_id');
        $instructors =  instructor::all()->where('department_id',$department_id);


       if ($request->selectedSpv == 0)
       $students =  student::where('department_id',$department_id)->where('spv_id',NULL)->paginate(5);
       else
        $students =  student::where('department_id',$department_id)->where('spv_id',$request->selectedSpv)->paginate(5);
        
        return view('instructors.DEC.Supervision' ,compact('instructors' , 'students'));
    }
    public function OverrideRequest(Request $request)
    {

        $validated = $request->validate([
            'reason' => 'required|max:200',
            'student_badge' => 'required|numeric',
            'code' => 'required|max:7'
        ]);

        $user_id = auth()->user()->id;
        $department_id = instructor::where('id',$user_id)->value('department_id');
        $student_id = student::where('badge',$request->student_badge)->where('department_id',$department_id)->value('id');
        $subject_id = subject::where('code',$request->code)->where('department_id',$department_id)->value('id');
       

         if (is_null($student_id) || is_null($subject_id))
              return back()->with('meassegeError' , 'يوجد خطأ في البيانات المدخلة');


        override_Request::insert(
            [
             'student_id' => $student_id,
             'subject_id' => $subject_id,
             'message' => $request->reason,
              
             
             ]
        );
       
        return back()->with('meassegeSent', [
            'name' =>  $request->student_name,
            'badge' =>  $request->student_badge,
            'code' => $request->code,
            
        ]);;

 
    } 
    

     
    public function NotifyAll(Request $request)

    {
        $user_id = auth()->user()->id;
        $college_id =  Instructor::where('id',$user_id)->value('college_id');

        $current_semester =  college::where('id',$college_id)->value('current_semester');
    
     
       
        $subject_id =  subject::where('id',$request->subject_id)
        ->value('id');

        $studentsCount =  student_mark::where('subject_id',$subject_id)
        ->where('subject_group',$request->group_id)
        ->where('semester_id',$current_semester)
        ->get()
        ->count();
       
        
        $group_id = $request->group_id;
        return view('instructors.Professor.notifyAll', compact('subject_id' , 'studentsCount' , 'group_id'));

    }
    public function NotofyAllAction(Request $request)

    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
            'subject_id' => 'required',
        ]);

 
        $user_id = auth()->user()->id;
        $college_id =  Instructor::where('id',$user_id)->value('college_id');
        $current_semester =  college::where('id',$college_id)->value('current_semester');
    
        $students =  student_mark::where('subject_id',$request->subject_id)
        ->where('semester_id',$current_semester)
        ->where('subject_group',$request->group_id)
        ->get();
    
        foreach($students as $student){
                            Notification::insert(
                                [
                                'sender_id' =>  $user_id ,
                                'reciver_id' => $student->student_id,
                                'title' => $request->title,
                                'message' =>$request->message,
                                'read' => 0,
                                'date' => date('Y-m-d')

                                ]
                            );
                        }
     
      
        return back()->with('message', 'تم ارسال الاشعار بنجاح ');;

    }



    
    public function StudentNotofyAlert(Request $request)
    {
 
     
     $student_id =  student::where('id',$request->student_id)->value('Badge');
     $professor_id = auth()->user()->id;
 
        return view('instructors.Professor.StudentsNotify', compact('student_id' , 'professor_id'));
    }

    public function StudentNotofyAlertAction(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ]);

 
        $user_id = auth()->user()->id;
        
        $student_id =  student::where('Badge',$request->studnet_badge)->value('id');
    

        Notification::insert(
            [
             'sender_id' =>  $user_id ,
             'reciver_id' => $student_id,
             'title' => $request->title,
             'message' =>$request->message,
             'read' => 0,
             'date' => date('Y-m-d')
             
          
             ]
        );
        return redirect('SupervisionList');
       
   
    }
}
