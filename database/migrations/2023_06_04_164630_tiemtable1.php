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
        Schema::create('TimeTable', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');;;
            $table->integer('day');
            
            $table->foreignId('Stp')->constrained('subjects')->onDelete('cascade');
            $table->foreignId('Sp')->constrained('subjects')->onDelete('cascade');
            $table->foreignId('Tp')->constrained('subjects')->onDelete('cascade');
            $table->foreignId('Fp')->constrained('subjects')->onDelete('cascade');
            
          

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TimeTable');
    }
};
