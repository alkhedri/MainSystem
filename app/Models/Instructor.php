<?php

namespace App\Models;

use App\Models\user;
use App\Models\city;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
 

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


    public static function getInstructorEmail($id){

        $InstructorEmail = user::where('id', $id)->value('email');
    
        return  $InstructorEmail;
  
    }

    public static function getInstructorCity($id){

        $InstructorCity = city::where('id', $id)->value('name');
    
        return  $InstructorCity;
  
    }
}
