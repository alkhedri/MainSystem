<?php

namespace App\Models;
use App\Models\subject;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamsTable extends Model
{
    use HasFactory;
    public $table = 'examstable';
    public $timestamps = false;

    public static function getRows($date){

        $rows = ExamsTable::where('date', $date)->get();
    
        return  ($rows->count() + 1);
  
    }

    public static function getSubs($date){

        $rows = ExamsTable::where('date', $date)->get();
    
        return  ($rows);
  
    } 
    public static function getSubjectName($name){

        $subject = subject::where('id', $name)->value('arabic_name');
    
        return  ($subject);
  
    } 
    
}
