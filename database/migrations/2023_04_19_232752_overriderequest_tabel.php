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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('arabic_name');
            $table->string('english_name');
            $table->integer('units');
            $table->integer('cousre_hours');
            $table->integer('work_housrs');
            $table->integer('work_mark');
            $table->integer('final_mark');
             
         
            $table->foreignId('department_id')->constrained('departments');
            $table->foreignId('college_id')->constrained('colleges');
           
            $table->boolean('avaliablity');
            $table->boolean('required');
            $table->string('proffesor_id');
           
    
    
            $table->timestamps();
     
     
        
        
        });
        Schema::create('override_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
           
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
           
            $table->string('message');
             
    
    
            $table->timestamps();
     
     
        
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('override_requests');
    }
};