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
            $table->string('college_id');
         
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
         $table->string('hod')->nullable();
         $table->string('dec')->nullable();
         $table->string('dqc')->nullable();
         $table->string('dpc')->nullable();
         $table->string('icon')->nullable();
         $table->longtext('message')->nullable();
         $table->integer('students_no')->nullable();
         $table->integer('graduated_no')->nullable();
         $table->integer('instructors_no')->nullable();
         $table->integer('demanded_no')->nullable();
        $table->timestamps();
 
 
    
    
    });



    Schema::create('cities', function (Blueprint $table) {
        $table->id();
         $table->string('name')->nullable();
        $table->timestamps();  
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semesters');
        Schema::dropIfExists('colleges');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('cities');
    }
};
