<?php


/*functions :

GET STUDENT NAME [ID]

GET STUDENT DEPARTMENT NAME [ID]

GET ALL STUDENTS COUNT

GET INTERMETENT STUDENTS COUNT

*/



namespace App\Models;
use App\Models\Auth;
use App\Models\user;
use App\Models\department;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nat_id',
        'arabic_name',
        'english_name',
        'sex',
        'Badge',
        'city_id',
        'phone',
        'department_id',
        'college_id',
        'units',
        'gpa',
        'enrollment_status_id'
        
    ];

    public static function getNameById($id){
        return User::where('id', $id)->pluck('name')->first();
    }
    public static function getDepNameById($id){
       $depid =  student::where('id', $id)->value('department_id'); 
        return department::where('id', $depid)->pluck('arabic_name')->first();
    }

    public static function getBadgeById($id){
        $badge =  student::where('id', $id)->value('badge'); 
         return $badge;
     }

    public static function count_all()
    {

        $user_id = auth()->user()->id;
        $College_id = Instructor::where('id',$user_id)->value('college_id');;
        $students = student::all()->where('college_id' , $College_id);


        return  $students->count();
    }


    public static function count_inter()
    {

        $user_id = auth()->user()->id;
        $College_id = Instructor::where('id',$user_id)->value('college_id');;
        $students = student::all()->where('college_id' , $College_id)->where('enrollment_status_id' , 3);


        return  $students->count();
    }
}
