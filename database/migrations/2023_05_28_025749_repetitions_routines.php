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
        Schema::create('repetitions_routines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('repetitions_id')->nullable()->constrained('repetitions');
            $table->foreignId('routines_id')->nullable()->constrained('routines');
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
