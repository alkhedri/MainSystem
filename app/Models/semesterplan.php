<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semesterplan extends Model
{
    use HasFactory;

    public $table = 'semestersplan';

    protected $fillable = [
        'renewalStarts',
        'renewalEnds',
        'SubjectStarts',
        'SubjectEnds',
        'StudntsMove',
        'semsStart',
        'semsEnds',

        'LastChanceAdd',
        'LastChanceDrop',
        'FirstMidsStarts',
        'FirstMidsEnds',

        'LastStop',
        'SecondMidsStarts',

        'SecondMidsEnds',
        'Lastlecture',

        'FinalsStarts',
        'FinalsEnds',

        'Results',
        'ReviewStarts',
        'ReviewEnds',
        'CheckStarts',
        'CheckEnds',
        'NextSem',



    ];

}
