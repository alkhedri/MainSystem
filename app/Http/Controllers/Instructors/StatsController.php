<?php

namespace App\Http\Controllers\Instructors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use App\Models\student_mark;
use DB;
use App\Models\student;
use App\Models\Semester;
use App\Models\subject;

class StatsController extends Controller
{
        //
        public function index()
        {
            
            
          
            //     $requirements = student_marks::where('subject', 3)->get();
    
            //     foreach ($requirements as $req){
    
                
            //     $final = student_mark::where('student_id', $user_id )
            //     ->where('subject_id', $req->requirement)->value('final');
    
            //     $work = student_mark::where('student_id', $user_id )
            //     ->where('subject_id', $req->requirement)->value('work');
    
            //     if (($final + $work) < 50 )
            //      {
            //         array_push($stack, "apple",);
            //      }
                   
            //  }
            $stack = array();
            $users = student_mark::where('subject_id' , 5)
            ->pluck('final', 'student_id');


        
                $labels = $users->keys();
                $data = $users->values();


                    foreach($labels as $std){
                        $student = student::where('id' , $std)->value('arabic_name');
                        array_push($stack, $student);
                    }
                         
             

            return view('instructors.HOD.Stats' , compact('stack', 'data'));
             
        }



public function students(Request $request){

     
    $studentName = student::where('id' , $request->id)->value('arabic_name');
                 
    $Semesters = student_mark::where('student_id' , $request->id)->groupBy('semester_id')->get();;
    


    foreach ($Semesters as $semester){
        $StudentSemesters = semester::where('id' , $semester->semester_id)->get();
    
    }
    $student_id =$request->id;
 

    return view('instructors.HOD.Statistics.students', compact('studentName' , 'Semesters' , 'student_id'  ));
             
}
    public function students_ActionSemester  (Request $request){

     
    
                 
    //$studentSubjects = student_mark::where('student_id' , $request->id)->where('semester_id' , $request->semester_id)->get();;
 
    $stack = array();


     $max = 0 ;
    if( $request->selection == 1){
        $users = student_mark::where('student_id' , $request->id)->where('semester_id' ,  $request->semester_id)
        ->pluck('work', 'subject_id');
        $max = 40 ;
    }
     else if( $request->selection == 2){
        $users = student_mark::where('student_id' , $request->id)->where('semester_id' , $request->semester_id)
        ->pluck('final', 'subject_id');
        $max = 60 ;
     }
    else{
        
    }
   



        $labels = $users->keys();
        $data = $users->values();


            foreach($labels as $std){
                $student = subject::where('id' , $std)->value('arabic_name');
                array_push($stack, $student);
            }


    return back()->with( [
        'stack' => $stack, 
        'data' => $data, 
        'max' => $max, 
    
    
    ] );
          
}

}
