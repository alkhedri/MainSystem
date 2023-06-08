<?php

namespace App\Http\Controllers\Instructors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use App\Models\student_mark;
use DB;
use App\Models\student;

class StatsController extends Controller
{
        //
        public function index()
        {
             $stack = array();
            
          
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
}
