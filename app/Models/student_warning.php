<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_warning extends Model
{
    use HasFactory;

        
    public static function CheckWarnings($id){
        $warnStatus = student_warning::where('student_id', $id)->get();
    
        if ($warnStatus === Null)
        return  0;
        else
        return  $warnStatus->count();
    }

}
