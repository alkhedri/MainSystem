<?php


/*functions :

GET DEAPRTMENT NAME [ID]

GET  DEPARTMENT SUBJECTS TOTALL [ID]

GET ALL STUDENTS COUNT

GET INTERMETENT STUDENTS COUNT

*/


namespace App\Models;


use App\Models\student_mark;

use App\Models\subject;
use App\Models\college;
use App\Models\Instructor;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;

    public static function getDepNameById($id){
       
         return department::where('id', $id)->pluck('arabic_name')->first();
     }



     // Subjects Done with Results

     public static function getSubjectsTottal($department_id){
       

        $total_subs = subject::where('department_id', $department_id)->get();

        return  $subsCount = $total_subs->count();
        
        
    }

    public static function getSubjectsNotDone($department_id){
       

        $total_subs_Done = subject::where('department_id', $department_id)->get();
        
        $user_id = auth()->user()->id;
        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $current_semester = college::where('id', $College_id)->value('current_semester');
 

        $subjectsNotDone = array();
         
            foreach( $total_subs_Done as $key => $subject)
            {
                $students = student_mark::where('subject_id', $subject->id)->where('semester_id' , $current_semester)->get();
                    foreach($students as $student)
                    if($student->work  == NULL || $student->final == NULL){
                  
                        array_push($subjectsNotDone , $subject->id);
                        unset($total_subs_Done[$key]);
                    }
                       
                        

            }
            $result = array_unique($subjectsNotDone);
        return   $result ;
        
        
    }
    public static function getSubjectsDoneCount($department_id){
       

        $total_subs_Done = subject::where('department_id', $department_id)->get();
        
        $user_id = auth()->user()->id;
        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $current_semester = college::where('id', $College_id)->value('current_semester');
 

        $subjectsNotDone = array();
         
            foreach( $total_subs_Done as $key => $subject)
            {
                $students = student_mark::where('subject_id', $subject->id)->where('semester_id' , $current_semester)->get();
                    foreach($students as $student)
                    if($student->work  == NULL || $student->final == NULL){
                  
                        array_push($subjectsNotDone , $subject->id);
                        unset($total_subs_Done[$key]);
                    }
                       
                        

            }
           
        return    $total_subs_Done->count();
        
        
    }
    


   
}
