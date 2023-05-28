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
        //
        Schema::create('exercises_repetitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercise_id')->constrained('exercises');
            $table->foreignId('repetition_id')->constrained('repetitions');
            $table->timestamps();
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
