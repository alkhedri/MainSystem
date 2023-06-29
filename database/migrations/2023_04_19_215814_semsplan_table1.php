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
       
        $table->date('renewalStarts')->nullable();
         $table->date('renewalEnds')->nullable();
         $table->date('SubjectStarts')->nullable();
          $table->date('SubjectEnds')->nullable();
         $table->date('StudntsMove')->nullable();
         $table->date('semsStart')->nullable();
         $table->date('semsEnds')->nullable();


         $table->date('LastChanceAdd')->nullable();
         $table->date('LastChanceDrop')->nullable();


         $table->date('FirstMidsStarts')->nullable();
         $table->date('FirstMidsEnds')->nullable();

         $table->date('LastStop')->nullable();
        

         $table->date('SecondMidsStarts')->nullable();
         $table->date('SecondMidsEnds')->nullable();

         $table->date('LastLecture')->nullable();
        

         $table->date('FinalsStarts')->nullable();
         $table->date('FinalsEnds')->nullable();



         $table->date('Results')->nullable();


         $table->date('ReviewStarts')->nullable();
         $table->date('ReviewEnds')->nullable();

         $table->date('CheckStarts')->nullable();
         $table->date('CheckEnds')->nullable();

         $table->date('NextSem')->nullable();


        $table->timestamps();
 
 
    
    
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SemestersPlan');
    }
};
