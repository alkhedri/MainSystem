<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;

   //// GET NAME
    public static function getSubjectName($id){
        $data =  subject::where('id', $id)->value('arabic_name'); 
         return $data;
     }
   /// GET CODE
     public static function getSubjectCode($id){
        $data =  subject::where('id', $id)->value('code'); 
         return $data;
     }



      ///GET UNITS
     public static function getSubjectUnits($id){
        $data =  subject::where('id', $id)->value('units'); 
         return $data;
     }
}
