<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department_demand extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getDemandedSubjects($department_id){
        $demanded = department_demand::where('department_id', $department_id)->get();
        return  $demanded;
              
    }

}
