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
        Schema::create('Subject_Requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject')->constrained('subjects')->onDelete('cascade');;
            $table->foreignId('requirement')->constrained('subjects')->onDelete('cascade');;
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Subject_Requirements');
    }
};
