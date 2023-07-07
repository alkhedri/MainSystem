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
        Schema::create('timetable_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id')->constrained('timetable')->onDelete('cascade');
            
            $table->string('Stp')->nullable();
            $table->string('Sp')->nullable();
            $table->string('Tp')->nullable();
            $table->string('Fp')->nullable();
            
          

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
