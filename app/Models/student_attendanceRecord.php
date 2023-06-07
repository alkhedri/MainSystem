<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_attendanceRecord extends Model
{
    use HasFactory;
    public $table = 'student_attendancerecords';
    public $timestamps = false;


    public static function CheckStatus($id){
        $status = student_attendanceRecord::where('student_id', $id)->value('status');
    
        if ( $status === 1)
        return  'حضور';
        else
        return  'غياب';
    }

    public static function CountPresent($date , $id){
        $Present = student_attendanceRecord::where('date', $date)->where('subject_id', $id)->where('status', 1)->get();   
        return  $Present->count();  
    }

    public static function CountUpsent($date , $id){
        $Upsent = student_attendanceRecord::where('date', $date)->where('subject_id', $id)->where('status', 0)->get();   
        return  $Upsent->count();  
    }
}