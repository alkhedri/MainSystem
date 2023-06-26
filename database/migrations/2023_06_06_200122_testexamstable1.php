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
        Schema::create('ExamsTable', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->text('F');
            $table->text('S');
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');;;
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