<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warning extends Model
{
    use HasFactory;


    public static function getWarnInfo($id){
        $warnName = warning::where('id', $id)->value('info');
    
        return  $warnName;
    }
}
