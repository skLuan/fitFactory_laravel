<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();

        User::factory()->create([
            'name' => 'Luan Erazo',
            'email' => 'erazo.luan@gmail.com',

        ]);
        User::factory()->create([
            'name' => 'Guest',
            'email' => 'guest@guest.com',
        ]);
        User::factory()->create([
            'name' => 'GuestCoach',
            'email' => 'coach@guest.com',
        ]);

        $this->call([
            ExercisesSeeder::class,
            TrainingTypeSeeder::class,
        ]);
    }
}
