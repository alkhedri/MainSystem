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
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();    
            $table->string('name');
            $table->timestamps();
    
       });

         // Create table for storing roles
         Schema::create('colleges', function (Blueprint $table) {
            $table->id();
             $table->string('arabic_name');
             $table->string('english_name');
             $table->string('icon');
             $table->foreignId('current_semester')->constrained('semesters')->onDelete('cascade');
             $table->boolean('final_results');
             $table->integer('required_units');
            $table->timestamps();

 
        });

    // Create table for storing roles
    Schema::create('departments', function (Blueprint $table) {
        $table->id();
        $table->string('code');
         $table->string('arabic_name');
         $table->string('english_name');
         $table->foreignId('college_id')->constrained('colleges')->onDelete('cascade');
         $table->string('hod');
         $table->string('dec');
         $table->string('dqc');
         $table->string('dpc');
         $table->string('icon');
         $table->longtext('message');
         $table->integer('students_no');
         $table->integer('graduated_no');
         $table->integer('instructors_no');
         $table->integer('demanded_no');
        $table->timestamps();
 
 
    
    
    });



    Schema::create('cities', function (Blueprint $table) {
        $table->id();
         $table->string('name');
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
