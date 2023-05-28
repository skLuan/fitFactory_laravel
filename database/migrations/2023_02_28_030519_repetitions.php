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
        Schema::create('repetitions', function (Blueprint $table) {
            $table->id();
            $table->integer('reps');
            $table->string('name');
            $table->foreignId('exercise_id')->nullable()->default(null)->constrained('exercises');
            // $table->time('time', $precision = 1);
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
