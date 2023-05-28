<?php

namespace Database\Seeders;

use App\Models\TrainingType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $Routines = [
            'EMON',
            'AMRAP',
            'Rounds',
            'Cartas',
            'Bingo',
        ];

        foreach ($Routines as $key => $value) {
            # code...
            $newExercise = TrainingType::firstOrCreate([
                'name' => $value,
            ]);
        }

        $newExercise->save();
    }
}
