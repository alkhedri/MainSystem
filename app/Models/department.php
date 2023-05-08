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

   
}
