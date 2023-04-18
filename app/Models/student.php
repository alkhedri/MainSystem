<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nat_id',
        'arabic_name',
        'english_name',
        'sex',
        'Badge',
        'city_id',
        'phone',
        'department_id',
        'college_id',
    ];

}
