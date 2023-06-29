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
            $table->date('date')->nullable();;
            $table->text('F')->nullable();;
            $table->text('S')->nullable();;
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
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
