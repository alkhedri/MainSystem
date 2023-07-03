<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class system extends Model
{
    use HasFactory;
    public $table = 'system';
    public $timestamps = false;


    public static function getDashlogo(){
        return    system::where('id' , 1)->value('dashBaordLogo');
    }
    public static function getMainlogo(){
        return    system::where('id' , 1)->value('mainLogo');
    }
    public static function getWelcomeText(){
        return    system::where('id' , 1)->value('welcomeText');
    }
    public static function background(){
        return    system::where('id' , 1)->value('background');
    }

    
           
}
