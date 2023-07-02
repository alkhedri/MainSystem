<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class college extends Model
{
    use HasFactory;

    public static function getNameById($id){
       
        return college::where('id', $id)->pluck('arabic_name')->first();
    }

}
