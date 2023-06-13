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
        Schema::create('TimeTable_Room', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id')->constrained('timetable')->onDelete('cascade');;;
            
            $table->foreignId('Stp')->constrained('rooms')->onDelete('cascade');;;
            $table->foreignId('Sp')->constrained('rooms')->onDelete('cascade');;;
            $table->foreignId('Tp')->constrained('rooms')->onDelete('cascade');;;
            $table->foreignId('Fp')->constrained('rooms')->onDelete('cascade');;;
            
          

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TimeTable_Room');
    }
};
