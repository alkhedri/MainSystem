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
        Schema::create('Rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('college_id')->constrained('colleges')->onDelete('cascade');
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Rooms');
    }
};
