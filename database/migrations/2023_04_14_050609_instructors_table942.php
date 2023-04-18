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
                 Schema::create('students', function (Blueprint $table) {
                    $table->foreignId('id')->constrained('users')->onDelete('cascade');
                    $table->string('nat_id')->unique();
                    $table->string('badge')->unique();
                    $table->string('arabic_name');
                    $table->string('english_name')->nullable();
                    $table->string('sex')->nullable();
                    $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
                    $table->string('phone')->nullable();
                    $table->date('birth')->nullable();
                    $table->date('enrollment')->nullable();
                    $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
                    $table->foreignId('college_id')->constrained('colleges')->onDelete('cascade');
                    $table->timestamps();
               
                });
               // Create table for storing roles
               Schema::create('instructors', function (Blueprint $table) {
                $table->foreignId('id')->constrained('users')->onDelete('cascade');
                $table->string('nat_id')->unique();
                $table->string('arabic_name');
                $table->string('english_name')->nullable();
                $table->string('sex')->nullable();
                $table->integer('job_id')->nullable();
                $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
                $table->string('phone')->nullable();
                $table->date('birth')->nullable();
                $table->date('enrollment')->nullable();
                $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
                $table->foreignId('college_id')->constrained('colleges')->onDelete('cascade');
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
