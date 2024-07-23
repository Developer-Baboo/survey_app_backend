<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DeductionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $deductions = [];

        // Assuming you have surveys and users already in the database
        $surveys = DB::table('surveys')->pluck('id')->toArray();
        $users = DB::table('users')->pluck('id')->toArray();

        // Generate deductions data
        for ($i = 1; $i <= 10; $i++) { // Example: Inserting 30 deductions records
            $deductions[] = [
                'survey_id' => $faker->randomElement($surveys),
                'user_id' => $faker->randomElement($users),
                'amount' => $faker->randomFloat(2, 5, 50), // Random amount between 5 and 50
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the database
        DB::table('deductions')->insert($deductions);
    }
}
