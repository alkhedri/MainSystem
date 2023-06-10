<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;
    public $timestamps = false;


    public static function UnRead(){
        $user_id = auth()->user()->id;
        $notifications = notification::where('reciver_id', $user_id)->where('read', 0)->get();
    
     
        return $notifications->count();
    }

    public static function getUnRead(){
        $user_id = auth()->user()->id;
        $notifications = notification::where('reciver_id', $user_id)->where('read', 0)->get();
    
     
        return $notifications;
    }
}
