<?php

namespace App\Models;
use App\Models\student_mark;

 
use App\Models\college;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_mark extends Model
{
    use HasFactory;

    public static function checkDuplicate($subject_id , $student_id){

        $check = student_mark::where('subject_id' , $subject_id)->where('student_id' ,$student_id)->get();

        return $check->count();
    }

    public static function StudentsCount($subject_id){
        $user_id = auth()->user()->id;
        $College_id = Instructor::where('id',$user_id)->value('college_id');
        $current_semester = college::where('id', $College_id)->value('current_semester');
 
        $count = student_mark::where('subject_id' , $subject_id)->where('semester_id' ,$current_semester)->get();

        return $count->count();
    }

    public static function checkIfPassed($subject_id , $student_id){

        $final = student_mark::where('subject_id' , $subject_id)->where('student_id' ,$student_id)->value('final');
        $work = student_mark::where('subject_id' , $subject_id)->where('student_id' ,$student_id)->value('work');

        if ($final + $work >= 50)
        return 1;
        else
        return 0;

        
    }

    public static function checkIfHasSubject($subject_id){
        $user_id = auth()->user()->id;
      
        $subject = student_mark::where('subject_id' , $subject_id)->where('student_id' ,$user_id)->where('semester_id' ,$current_semester)->get();
      
        if ($subject->count() > 0)
        return 1;
        else
        return 0;

        
    }


    
 
}
