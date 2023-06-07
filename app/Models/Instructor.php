<?php

namespace App\Models;

use App\Models\user;
use App\Models\city;
use App\Models\department;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $fillable = [
        'id',
        'nat_id',
        'arabic_name',
        'english_name',
        'sex',
        'job_id',
        'city_id',
        'phone',
        'department_id',
        'college_id',
    ];

    public static function getInstructorsName($id){

        $Instructorname = instructor::where('id', $id)->value('arabic_name');
    
        return  $Instructorname;
  
    }

    public static function getInstructorDepartment($id){

        $InstructorDepID = instructor::where('id', $id)->value('department_id');
        $InstructorDep = department::where('id', $InstructorDepID)->value('arabic_name');
    
        return  $InstructorDep;
  
    }
    public static function getInstructorEmail($id){

        $InstructorEmail = user::where('id', $id)->value('email');
    
        return  $InstructorEmail;
  
    }

    public static function getInstructorCity($id){

        $InstructorCity = city::where('id', $id)->value('name');
    
        return  $InstructorCity;
  
    }
}
