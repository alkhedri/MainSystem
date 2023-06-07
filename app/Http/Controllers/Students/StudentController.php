<?php

namespace App\Http\Controllers\Students;
use App\Models\college;
use App\Models\department;
use App\Models\student_mark;
use App\Models\student;
use App\Models\subject;
use App\Models\subject_requirement;
use App\Models\semester;
use App\Models\notification;
use App\Models\subject_date;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $user_id = auth()->user()->id;
        $department_id = student::where('id',$user_id)->value('department_id');

        $college_id = department::where('id',$department_id)->value('college_id');
        $current_semester = college::where('id',$college_id)->value('current_semester');

        

        $notificationsCount = notification::where('reciver_id',$user_id)->count();
        $notificationsCountUnRead = notification::where('reciver_id',$user_id)->where('read',0)->count();
        



        $Student_subjects = student_mark::where('student_id',$user_id)->where('semester_id',$current_semester)->get();
         $alertDates = 0;
        foreach ($Student_subjects as $subject){

            $subject_date = subject_date::where('subject_id', $subject->subject_id)->count();
            if (!is_null($subject_date)) {
                $alertDates+= $subject_date;
        }
    }

        return view('Student._main' , compact('notificationsCount', 'notificationsCountUnRead' , 'alertDates'));
    }
    public function show_currentSemSubs(Request $request)
    {

        $user_id = auth()->user()->id;
        $department_id = student::where('id',$user_id)->value('department_id');

        $college_id = department::where('id',$department_id)->value('college_id');
        $current_semester = college::where('id',$college_id)->value('current_semester');


        $Student_subjects = student_mark::where('student_id',$user_id)->where('semester_id',$current_semester)->get();
        $current_semester_name = semester::where('id',$current_semester)->value('name');
        $units = 0;


        foreach( $Student_subjects as $sub)
        {
            $subjectUnits = subject::where('id',$sub->subject_id)->value('units');
           $units+= $subjectUnits;
        }
        

        return view('Student._CurrentSubjects' , compact('Student_subjects' , 'current_semester_name' , 'units'));
    }




    
    public function show_EditSubjects(Request $request)
    {
        $user_id = auth()->user()->id;
        $department_id = student::where('id',$user_id)->value('department_id');

        $college_id = department::where('id',$department_id)->value('college_id');
        $current_semester = college::where('id',$college_id)->value('current_semester');


        $Student_subjects = student_mark::where('student_id',$user_id)->where('semester_id',$current_semester)->get();
        $Department_subjects = subject::where('department_id',$department_id)->where('avaliablity','1')->get();

        
        return view('Student._EditSubjects' ,compact('Student_subjects' , 'Department_subjects') );
    }
    
    public function AddSubject(Request $request){

        $user_id = auth()->user()->id;
        $department_id = student::where('id',$user_id)->value('department_id');
        $college_id = department::where('id',$department_id)->value('college_id');
        $current_semester = college::where('id',$college_id)->value('current_semester');

        $checkExists = student_mark::where('department_id', $department_id )
        ->where('student_id', $user_id )
        ->where('semester_id', $current_semester )
        ->where('subject_id', $request->subject_id)->first();
  
       
                    $requirements = subject_requirement::where('subject', $request->subject_id)->get();
                    $checkLegit = 0;
                    foreach ($requirements as $req){

                        $final = student_mark::where('department_id', $department_id )
                        ->where('student_id', $user_id )
                        ->where('subject_id', $req->requirement)->value('final');

                        $work = student_mark::where('department_id', $department_id )
                        ->where('student_id', $user_id )
                        ->where('subject_id', $req->requirement)->value('work');
                

                if (($final + $work) < 50 )
                                $checkLegit++;
                        

                    }

 

        if (is_null($request->subject_id))
            return back()->with('Alert', 'قم بإختيار مقرر أولا');
            else if(!is_null($checkExists))
            return back()->with('Alert', 'المقرر موجود مسبقا');
            else if($checkLegit > 0)
            return back()->with('Alert', 'هذا المقرر غير متوفر');
            
        student_mark::Insert(
            [
             'student_id' => $user_id,
             'subject_id' => $request->subject_id,
             'semester_id' => $current_semester,
             'department_id' => $department_id,
             'college_id' => $college_id,
             'work' => NULL,
             'final' => NULL,
             ]
        );
        $subjectName = subject::where('id',$request->subject_id)->value('Arabic_name');

        return back()->with('Success', $subjectName);
         
    }




    public function DropSubject(Request $request)
    {
        $user_id = auth()->user()->id;
        $department_id = student::where('id',$user_id)->value('department_id');
        $college_id = department::where('id',$department_id)->value('college_id');
        $current_semester = college::where('id',$college_id)->value('current_semester');

     
        student_mark::where('department_id', $department_id )
        ->where('student_id', $user_id )
        ->where('semester_id', $current_semester )
        ->where('id', $request->subject_id)->delete();

        return back()->with('Alert', 'تم إسقاط المقرر');
        
        
    }
 

    

    
    public function show_NotifyMenu(Request $request)
    {
        $user_id = auth()->user()->id;

       

        $notifications = notification::where('reciver_id',$user_id)->orderBy('id','DESC')->paginate(5);

        
        return view('Student._NotifyMenu' , compact('notifications'));
    }



    public function ShowNotificationMessage(Request $request)
    {
        $user_id = auth()->user()->id;

        
        
        $message = notification::where('reciver_id',$user_id)->where('id',$request->id)->get();

        notification::where('reciver_id', $user_id)
        ->where('id', $request->id)
        ->update([
 
            'read' => 1,
       
         ]);
        return view('Student._ShowMessage' , compact('message'));
    }
    
    public function RequirementsMenu(Request $request)
    {
        $user_id = auth()->user()->id;
        $department_id = student::where('id',$user_id)->value('department_id');
        $college_id = department::where('id',$department_id)->value('college_id');
        $current_semester = college::where('id',$college_id)->value('current_semester');

     
        $Requirements = subject_date::where('subject_id',$user_id)->where('id',$request->id)->get();

        $Student_subjects = student_mark::where('student_id',$user_id)->where('semester_id',$current_semester)->get();
         
       //foreach ($Student_subjects as $subject)
          // $subject_date = subject_date::where('subject_id', $subject->subject_id)->get();
    

        return view('Student._RequirementsMenu' , compact('Student_subjects'));
    }



    
}
