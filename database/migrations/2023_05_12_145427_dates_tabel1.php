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
        Schema::create('Subject_Dates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('due_date');
            $table->date('sent_date');

            
            $table->date('details');
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Subject_Dates');
    }
};
