<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
class SurveysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $faker = Faker::create();

        $surveys = [];

        for ($i = 1; $i <= 10; $i++) { // Example: Inserting 10 surveys records
            $surveys[] = [
                'type' => $faker->randomElement(['profile', 'survey']),
                'name' => $faker->sentence(3),
                'order' => $faker->numberBetween(1, 10),
                'full_reward' => $faker->randomFloat(2, 20, 100),
                'timer_hours' => $faker->numberBetween(1, 24),
                'reduced_reward' => $faker->randomFloat(2, 10, 50),
                'expiry' => $faker->dateTimeBetween('now', '+1 year'),
                'status' => $faker->boolean(),
                'pushed_at' => $faker->boolean() ? $faker->dateTimeBetween('-1 year', 'now') : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the database
        DB::table('surveys')->insert($surveys);
    }
}
