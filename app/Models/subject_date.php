<?php

namespace App\Models;


use App\Models\student_mark;
use App\Models\college;
use App\Models\student;




use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject_date extends Model
{
    use HasFactory;


    public static function getDueDate($id){

        $dates = subject_date::where('id' , $id)->value('due_date');

             return $dates;
      }
      public static function getDate($id){

        $dates = subject_date::where('id' , $id)->value('sent_date');

             return $dates;
      }
      public static function getName($id){

        $name = subject_date::where('id' , $id)->value('name');

           return $name;
      }

      public static function getDetails($id){

        $name = subject_date::where('id' , $id)->value('details');

           return $name;
      }

      public static function getReq($id){

        $name = subject_date::where('subject_id' , $id)->get();

           return $name;
      }

      public static function getStudentSubject(){


        $user_id = auth()->user()->id;
        $college_id = student::where('id', $user_id)->value('college_id');
        $current = college::where('id', $college_id)->value('current_semester');
        $student_subjects = student_mark::where('student_id', $user_id)->where('semester_id', $current)->get();
    


     
        return $student_subjects;
    }
    }