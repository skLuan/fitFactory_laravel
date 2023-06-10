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
        Schema::create('routines_wod', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wod_id', 50)->constrained('Wods');
            $table->foreignId('routine_id', 50)->constrained('routines');
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
