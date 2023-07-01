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
            $table->string('nat_id')->unique();
            $table->string('arabic_name');

            $table->string('english_name')->nullable();
            $table->string('sex')->nullable();

            $table->string('Badge')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('enrollment_date')->nullable();
           
            $table->integer('phone')->nullable();
            $table->integer('department_id')->constrained('departments')->onDelete('cascade');

            $table->integer('college_id')->constrained('colleges')->onDelete('cascade');
            $table->integer('units')->nullable();
       
            $table->integer('gpa')->nullable();
            $table->integer('enrollment_status_id')->nullable();
           
            $table->integer('DepartmentJoin_sem_id')->constrained('semesters')->onDelete('cascade');
           
            $table->integer('old_department_id')->nullable();
           
            
            
            

        });
 
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('nat_id');
            $table->string('arabic_name');

            $table->string('english_name')->nullable();
            $table->string('sex')->nullable();

            $table->string('job_id')->nullable();
            $table->integer('city_id')->nullable();

            $table->integer('phone')->nullable();
            $table->integer('department_id')->constrained('departments')->onDelete('cascade');

            $table->integer('college_id')->constrained('colleges')->onDelete('cascade');
    
         
            
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
