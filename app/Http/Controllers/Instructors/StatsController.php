<?php

namespace App\Http\Controllers\Instructors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use App\Models\student_mark;
 
use App\Models\student;
use App\Models\semester;
use App\Models\subject;
use App\Models\student_attendanceRecord;

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
        $title = 'الأعمال';

    }
     else if( $request->selection == 2){
        $users = student_mark::where('student_id' , $request->id)->where('semester_id' , $request->semester_id)
        ->pluck('final', 'subject_id');
        $max = 60 ;
        $title = 'الإمتحان النهائي';

     }
    else if( $request->selection == 3){

        $users = student_mark::where('student_id' , $request->id)->where('semester_id' , $request->semester_id)
        ->pluck('final', 'subject_id');
        $max = 100 ;
        $title = 'نموذج 4';


                $labels = $users->keys();
               
                $data = array();
   

                    foreach($labels as $std){
                        $student = subject::where('id' , $std)->value('arabic_name');
                        array_push($stack, $student);
                    }


                    foreach($labels as $std){
                        $final = student_mark::where('student_id' , $request->id)
                        ->where('semester_id' , $request->semester_id)
                        ->where('subject_id' , $std)->value('final');

                        $work = student_mark::where('student_id' , $request->id)
                        ->where('semester_id' , $request->semester_id)
                        ->where('subject_id' , $std)->value('work');

                            $result = $final + $work;
                        array_push($data, $result);
                    }



            return back()->with( [
                'stack' => $stack, 
                'data' => $data, 
                'max' => $max, 
                'title' => $title, 
                    
            
            ] );


        
    }else if( $request->selection == 4){
        $users = student_attendanceRecord::where('student_id' , $request->id)
        ->pluck('status', 'subject_id');
        $max = 12 ;
        $title = 'سجل الحضور';

        $counter = array();
        $countervar = 0;
        $labels = $users->keys();

        foreach($labels as $std){
            $student = student_attendanceRecord::where('subject_id' , $std)->where('student_id' , $request->id)->get();

            foreach( $student as $count){
                if ($count->status == 1)
                $countervar++;
            }
            array_push($counter, $countervar);
            $countervar = 0;
        }


       
        $data = $counter;


            foreach($labels as $std){
                $student = subject::where('id' , $std)->value('arabic_name');
                array_push($stack, $student);
            }

            return back()->with( [
                'stack' => $stack, 
                'data' => $data, 
                'max' => $max, 
                'title' => $title, 
            
                
            ] );
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
        'title' => $title, 
            
    
    ] );
          
}

}
