<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    use HasFactory;

    public static function getName($id){
        $name = semester::where('id', $id)->value('name');
    
     
        return $name;
    
    }

}
