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
            $table->foreignId('department_id')->constrained('departments');
            $table->integer('day');
            
            $table->foreignId('Stp')->constrained('subjects');
            $table->foreignId('Sp')->constrained('subjects');
            $table->foreignId('Tp')->constrained('subjects');
            $table->foreignId('Fp')->constrained('subjects');
            
          

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
