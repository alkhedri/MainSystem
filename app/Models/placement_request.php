<?php

namespace App\Models;

use App\Models\student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class placement_request extends Model
{
    use HasFactory;


    public static function getStudentGpaById($id){

        $requests = placement_request::get()->unique('student_id')->toQuery()->paginate(20);

          $array= student::where('student_id', $id)->orderBy('praiority','asc')->get();
          return $array;
      }


    public static function getDeoartmentsById($id){

      //  $array = placement_request::all()->where('student_id', $id)->orderBy('created_at', 'desc')->get();
        $array= placement_request::where('student_id', $id)->orderBy('praiority','asc')->get();
        return $array;
    }
}
