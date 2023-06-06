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
            $table->foreignId('day_id')->constrained('TimeTable');
            
            $table->foreignId('Stp')->constrained('Rooms');
            $table->foreignId('Sp')->constrained('Rooms');
            $table->foreignId('Tp')->constrained('Rooms');
            $table->foreignId('Fp')->constrained('Rooms');
            
          

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
