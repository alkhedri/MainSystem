<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
 

    protected $fillable = [
        'id',
        'nat_id',
        'arabic_name',
        'english_name',
        'sex',
        'job_id',
        'city_id',
        'phone',
        'department_id',
        'college_id',
    ];

}
