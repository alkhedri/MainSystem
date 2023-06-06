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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nat_id');
            $table->string('arabic_name');

            $table->string('english_name');
            $table->string('sex');

            $table->string('Badge');
            $table->integer('city_id');

            $table->integer('phone');
            $table->integer('department_id');

            $table->integer('college_id');
            $table->integer('units');

            $table->integer('gpa');
            $table->integer('enrollment_status_id');
           
          
          

        });
 
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('nat_id');
            $table->string('arabic_name');

            $table->string('english_name');
            $table->string('sex');

            $table->string('job_id');
            $table->integer('city_id');

            $table->integer('phone');
            $table->integer('department_id');

            $table->integer('college_id');
    
         
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       // Schema::dropIfExists('students');
        Schema::dropIfExists('instructors');
    }
};
