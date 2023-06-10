<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;

    public static function getName($id){
        $name = room::where('id', $id)->value('name');
    
     
        return $name;
    
    }
}
