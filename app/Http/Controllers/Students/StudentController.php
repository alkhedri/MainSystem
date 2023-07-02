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
use App\Models\semesterplan;
use App\Models\timeTable;
use App\Models\placement_request;
use App\Models\User;
use App\Models\student_warning;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $user_id = auth()->user()->id;
        $department_id = student::where('id',$user_id)->value('department_id');

        $college_id = department::where('id',$department_id)->value('college_id');
        $current_semester = college::where('id',$college_id)->value('current_semester');

        $current_semester_name = semester::where('id',$current_semester)->value('name');


        $notificationsCount = notification::where('reciver_id',$user_id)->count();
        $notificationsCountUnRead = notification::where('reciver_id',$user_id)->where('read',0)->count();
        

        $alertsCount = student_warning::where('student_id',$user_id)->count();

        $Student_subjects = student_mark::where('student_id',$user_id)->where('semester_id',$current_semester)->get();
         $alertDates = 0;
        foreach ($Student_subjects as $subject){

            $subject_date = subject_date::where('subject_id', $subject->subject_id)->count();
            if (!is_null($subject_date)) {
                $alertDates+= $subject_date;
        }
    }

 
       $Saturday = timeTable::where('department_id',$department_id)->where('day', 0)->get();
        $Sunday = timeTable::where('department_id',$department_id)->where('day', 1)->get();
        $Monday = timeTable::where('department_id',$department_id)->where('day', 2)->get();
        $Tuesday = timeTable::where('department_id',$department_id)->where('day', 3)->get();
        $Wedensday = timeTable::where('department_id',$department_id)->where('day', 4)->get();
        $Thursday = timeTable::where('department_id',$department_id)->where('day', 5)->get();
       
         
        foreach($Saturday as $day){
         
            $subject = student_mark::where('subject_id' , $day->Stp)->where('student_id' ,$user_id)->where('semester_id' ,$current_semester)->get()->count();
             if ($subject == 0)
                unset($day->Stp);
            
                $subject = student_mark::where('subject_id' , $day->Sp)->where('student_id' ,$user_id)->where('semester_id' ,$current_semester)->get()->count();
                if ($subject == 0)
                   unset($day->Sp);

                   $subject = student_mark::where('subject_id' , $day->Tp)->where('student_id' ,$user_id)->where('semester_id' ,$current_semester)->get()->count();
                   if ($subject == 0)
                      unset($day->Tp);

                      $subject = student_mark::where('subject_id' , $day->Fp)->where('student_id' ,$user_id)->where('semester_id' ,$current_semester)->get()->count();
                      if ($subject == 0)
                         unset($day->Fp);
              
          }


       
  
          toast('لديك عدد [ '.$notificationsCountUnRead.' ] اشعار غير مقروء', 'info');
      
     
        return view('Student._main' , compact(
            'notificationsCount',
             'notificationsCountUnRead' ,
              'alertDates' ,
              'alertsCount',
              'current_semester_name',
              'Saturday',
            'Sunday',
            'Monday',
            'Tuesday',
            'Wedensday',
            'Thursday',
            'user_id'

               
            
            ));
    }
    public function profile(Request $request){
        $user_id = auth()->user()->id;
        $department_id = student::where('id',$user_id)->value('department_id');
      
        $profile = student::where('id', $user_id)->where('department_id', $department_id)->get();
 
        $College_id = student::where('id',$user_id)->value('college_id');

        $current_Semester = college::where('id',$College_id)->value('current_semester');

        $Students_Subjects = student_mark::where('student_id', $request->id)->where('semester_id', $current_Semester)->pluck('subject_id');
        $Students_warnings = student_warning::where('student_id', $request->id)->pluck('warning_id');
        $student_arabic_name = student::where('id', $request->id)->where('department_id', $department_id)->value('arabic_name');

        
 
        return view('Student.profile._myProfile', compact('profile' , 'Students_Subjects' , 'Students_warnings' , 'student_arabic_name'));
    }

    public function profile_Edit(Request $request){
        $user_id = auth()->user()->id;
       
        $validated = $request->validate([
 
            'phone' => 'numeric',
        ]);

        student::where('id', $user_id)
        ->update([
            'phone' =>  $request->phone,
            'birth' => $request->birth,
            'sex' => $request->sex,

         ]);
        return back();
    }

    public function SemestersPlan()
    {
        $user_id = auth()->user()->id;
   
      //  $user =  auth()->user();
      
         
        //$user->givePermission('dec-read');
       
        $College_id = student::where('id',$user_id)->value('college_id');
        $semester_id = College::where('id',$College_id)->value('current_semester');


        $semesterplan =  semesterplan::all()->where('college_id',$College_id)->where('semester_id' , $semester_id);
        $SEMESTER_NAME = Semester::where('id',$semester_id)->value('name');
        
      
        return view('Student._SemesterPlan' , compact('semesterplan' , 'SEMESTER_NAME'));
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


    public function show_oldSemSubs(Request $request)
    {

        $user_id = auth()->user()->id;

        $Semesters = student_mark::where('student_id',$user_id)
        ->groupBy('semester_id')
        ->get();
       


        return view('Student.oldSems._PrevSemesters' , compact('Semesters'));
    }

    public function oldSemData(request $request){
        $user_id = auth()->user()->id;
        $department_id = student::where('id',$user_id)->value('department_id');

        $college_id = department::where('id',$department_id)->value('college_id');
        

        $Student_subjects = student_mark::where('student_id',$user_id)->where('semester_id',$request->semester_id)->get();
 
        $units = 0;

        
        $Semesters = student_mark::where('student_id',$user_id)
        ->groupBy('semester_id')
        ->get();
       
        foreach( $Student_subjects as $sub)
        {
            $subjectUnits = subject::where('id',$sub->subject_id)->value('units');
           $units+= $subjectUnits;
        }

        $Selected_Semester_id = $request->semester_id;
        return view('Student.oldSems._PrevSemesters' , compact('Student_subjects' , 'units' , 'Semesters' , 'Selected_Semester_id'));
   
    }


    
    public function show_EditSubjects(Request $request)
    {
        $user_id = auth()->user()->id;
        $department_id = student::where('id',$user_id)->value('department_id');

        $college_id = department::where('id',$department_id)->value('college_id');
        $current_semester = college::where('id',$college_id)->value('current_semester');

        $GSdepartment = department::where('code','GS')->value('id');


        $Student_subjects = student_mark::where('student_id',$user_id)->where('semester_id',$current_semester)->get();


        $Department_subjects = subject::where(function ($query) use ($department_id , $GSdepartment) {
            $query->where('department_id',$department_id)
                ->orWhere('department_id', $GSdepartment);
        })->where('avaliablity','1')->get();
        
        ///---- CHECK IF ALREADY PASSED 
        foreach ($Department_subjects as $key => $subject){

             

                $final = student_mark::where('student_id', $user_id )
                ->where('subject_id', $subject->id)->value('final');

                $work = student_mark::where('student_id', $user_id )
                ->where('subject_id', $subject->id)->value('work');

                    if (($final + $work) > 49 )
                        unset($Department_subjects[$key]);
                        // $Department_subjects->forget($subject);
                    // echo "<script>alert('$subject->arabic_name') </script> ";
               
                 
    }

        ///---- CHECK IF REQUIRED ACHIVED
        foreach ($Department_subjects as $key => $subject){
     
            $requirements = subject_requirement::where('subject', $subject->id)->get();
            foreach ($requirements as $req){

                $final = student_mark::where('student_id', $user_id )
                ->where('subject_id', $req->requirement)->value('final');

                $work = student_mark::where('student_id', $user_id )
                ->where('subject_id', $req->requirement)->value('work');

                    if (($final + $work) < 50 )
                        unset($Department_subjects[$key]);
                        // $Department_subjects->forget($subject);
                    // echo "<script>alert('$subject->arabic_name') </script> ";
               
                 }   
    }
                
    $units = 0;


    foreach( $Student_subjects as $sub)
    {
        $subjectUnits = subject::where('id',$sub->subject_id)->value('units');
       $units+= $subjectUnits;
    }
    
     ///$collection->forget($key);
     $title = 'سيتم اسقاط المقرر';
     $text = "تأكيد اسقاط مقرر";
     confirmDelete($title, $text);
        return view('Student._EditSubjects' ,compact('Student_subjects' , 'Department_subjects' , 'units') );
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

        $checkAvalibility = subject::where('department_id', $department_id )
        ->where('id', $request->subject_id)
        ->value('avaliablity');

        
  
        $Student_subjects = student_mark::where('department_id', $department_id )
        ->where('student_id', $user_id )
        ->where('semester_id', $current_semester )->get();

        $UnitsCount = 0;
        foreach($Student_subjects as $subject){
            $Subjectunits = subject::where('id', $subject->subject_id)->value('units');

            $UnitsCount =  $UnitsCount +  $Subjectunits;
        }

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
            else if ($UnitsCount >= 18)
            return back()->with('Alert', 'لقد تجاوزت عدد الوحدات المسموح به');
            else if ($checkAvalibility == 0)
            return back()->with('Alert', 'غير مسموح بتنزيل هذا المقرر');
            
            
            
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
       // return back()->Alert::success('Success Title', 'Success Message');

       
         
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

        
        return view('Student._notifyMenu' , compact('notifications'));
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

    public function show_PlacementApplication()
    {
        $user_id = auth()->user()->id;
        $department_id = student::where('id',$user_id)->value('department_id');
        $college_id = department::where('id',$department_id)->value('college_id');
      
     
        $departments = department::where('id', '!=', $department_id)->where('college_id',$college_id)->get();

    
        return view('Student._PlacementApplication' , compact('departments'));
    }
    public function PlacementApplicationAction(Request $request)
    {
        $user_id = auth()->user()->id;
        $department_id = student::where('id',$user_id)->value('department_id');
        $college_id = department::where('id',$department_id)->value('college_id');
      
        $applications = $request->get('applications');
        $count_items = count($request->applications);

        $departments = department::where('id', '!=', $department_id)->where('college_id',$college_id)->get();

         for($i = 0 ;  $i < $count_items ; $i++)
                placement_request::Insert(
                    [
                    'student_id' => $user_id,
                    'department_id' => $applications[$i],
                    'college_id' => $college_id,
                    'praiority' => $i+1,
                
                    ]
                );


                $user = User::find($user_id);

                        if($user->hasPermission('placements'))
                         $user->removePermission('placements');

        return redirect()->route('studentDashboard');
    }
    
    
    public function TimeTable()
    {
        $user_id = auth()->user()->id;
        $department_id = Instructor::where('id',$user_id)->value('department_id');

     
        $Saturday = timeTable::where('department_id',$department_id)->where('day', 0)->get();
        $Sunday = timeTable::where('department_id',$department_id)->where('day', 1)->get();
        $Monday = timeTable::where('department_id',$department_id)->where('day', 2)->get();
        $Tuesday = timeTable::where('department_id',$department_id)->where('day', 3)->get();
        $Wedensday = timeTable::where('department_id',$department_id)->where('day', 4)->get();
        $Thursday = timeTable::where('department_id',$department_id)->where('day', 5)->get();
      
 


        $Department_subjects = subject::where('department_id',$department_id)->get();
        $Department_Rooms = room::where('department_id',$department_id)->get();
        $departmentName = department::where('id',$department_id)->value('arabic_name');
        
        return view('instructors.DEC.TimeTable' , compact(
            'Saturday',
            'Sunday',
            'Monday',
            'Tuesday',
            'Wedensday',
            'Thursday',
            'Department_subjects',
            'Department_Rooms',
            'departmentName'
        ));   
    }
}
