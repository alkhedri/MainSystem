<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            // Create table for storing roles
    Schema::create('SemestersPlan', function (Blueprint $table) {
        $table->id();
        $table->foreignId('college_id')->constrained('colleges')->onDelete('cascade');
       
        $table->foreignId('semester_id')->constrained('semesters')->onDelete('cascade');
       
        $table->date('renewalStarts');
         $table->date('renewalEnds');
         $table->date('SubjectStarts');
          $table->date('SubjectEnds');
         $table->date('StudntsMove');
         $table->date('semsStart');
         $table->date('semsEnds');


         $table->date('LastChanceAdd');
         $table->date('LastChanceDrop');


         $table->date('FirstMidsStarts');
         $table->date('FirstMidsEnds');

         $table->date('LastStop');
        

         $table->date('SecondMidsStarts');
         $table->date('SecondMidsEnds');

         $table->date('LastLecture');
        

         $table->date('FinalsStarts');
         $table->date('FinalsEnds');



         $table->date('Results');


         $table->date('ReviewStarts');
         $table->date('ReviewEnds');

         $table->date('CheckStarts');
         $table->date('CheckEnds');

         $table->date('NextSem');


        $table->timestamps();
 
 
    
    
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
