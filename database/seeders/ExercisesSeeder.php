<?php

namespace Database\Seeders;

use App\Models\Exercises;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExercisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $linda = [
            'Power Snatch',
            'Pistols',
            'Over Head Snatch',
            'Burpee',
            'Snatch Balance',
            'Pull ups',
            'Push ups',
            'Bastard',
            'Power Squat',
            'Sit up V',
            'Hollow Rock',
        ];

        foreach ($linda as $key => $value) {
            # code...
            $newExercise = Exercises::firstOrCreate([
                'name' => $value,
            ]);
        }

        $newExercise->save();
    }
}
