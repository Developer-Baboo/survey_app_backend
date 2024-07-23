<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EarningsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $earnings = [];

        // Generate earnings data
        for ($i = 1; $i <= 10; $i++) { // Example: Inserting 50 earnings records
            $earnings[] = [
                'type' => $faker->randomElement(['profile_completion', 'survey', 'referral']),
                'entity_id' => $faker->randomNumber(5),
                'user_id' => $faker->numberBetween(1, 10), // Assuming user IDs from 1 to 10
                'amount' => $faker->randomFloat(2, 10, 100), // Random amount between 10 and 100
                'is_partial' => $faker->boolean(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the database
        DB::table('earnings')->insert($earnings);
    }
}
