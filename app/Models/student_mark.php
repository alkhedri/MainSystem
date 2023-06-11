<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_mark extends Model
{
    use HasFactory;

    public static function checkDuplicate($subject_id , $student_id){

        $check = student_mark::where('subject_id' , $subject_id)->where('student_id' ,$student_id)->get();

        return $check->count();
    }
}
