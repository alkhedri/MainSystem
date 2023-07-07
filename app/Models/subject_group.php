<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject_group extends Model
{
    use HasFactory;
    public $timestamps = false;
    ///GET PROFESSORS GROUPS
    public static function getSubjectGroups($id){
        $data =  subject_group::where('subject_id', $id)->get(); 
         return $data;
     }
}
