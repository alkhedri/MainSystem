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
            $table->string('code')->unique();
            $table->string('arabic_name')->nullable();
            $table->string('english_name')->nullable();
            $table->integer('units')->nullable();
            $table->integer('cousre_hours')->nullable();
            $table->integer('work_housrs')->nullable();
            $table->integer('work_mark')->nullable();
            $table->integer('final_mark')->nullable();
             
         
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');;;
            $table->foreignId('college_id')->constrained('colleges')->onDelete('cascade');
           
            $table->boolean('avaliablity');
            $table->boolean('required');
            $table->string('proffesor_id')->nullable();
           
    
    
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
