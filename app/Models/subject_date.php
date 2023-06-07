<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject_date extends Model
{
    use HasFactory;


    public static function getDueDate($id){

        $dates = subject_date::where('subject_id' , $id)->value('due_date');

             return $dates;
      }
      public static function getDate($id){

        $dates = subject_date::where('subject_id' , $id)->value('sent_date');

             return $dates;
      }
      public static function getName($id){

        $name = subject_date::where('subject_id' , $id)->value('name');

           return $name;
      }

      public static function getDetails($id){

        $name = subject_date::where('subject_id' , $id)->value('details');

           return $name;
      }

      public static function getReq($id){

        $name = subject_date::where('subject_id' , $id)->get();

           return $name;
      }

      
    }