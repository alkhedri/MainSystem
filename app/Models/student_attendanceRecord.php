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

    public static function CountPresent($date , $id ,$group){
        $Present = student_attendanceRecord::where('date', $date)
        ->where('subject_id', $id)
        ->where('group_id', $group)
        ->where('status', 1)
        ->get();   
        return  $Present->count();  
    }

    public static function CountUpsent($date , $id ,$group){
        $Upsent = student_attendanceRecord::where('date', $date)
        ->where('subject_id', $id)
        ->where('group_id', $group)
        ->where('status', 0)
        ->get();   
        return  $Upsent->count();  
    }

 
    public static function CheckStatusSheet($id  ,$subject_id){


        $status = student_attendanceRecord::where('student_id', $id)->where('subject_id', $subject_id)->get();
    
    
        return $status ;
     
    }

    public static function AttendanceSheetPresentCount($id  ,$subject_id){
        $present = student_attendanceRecord::where('student_id', $id)->where('subject_id', $subject_id)->where('status', 1)->get();
        $all = student_attendanceRecord::where('student_id', $id)->where('subject_id', $subject_id)->get();

        
        return round(($present->count() /  $all->count()) * 100) ;
    }

    public static function AttendanceSheetAllCount($id  ,$subject_id){
    
        
        return $all->count() ;
    }

}
