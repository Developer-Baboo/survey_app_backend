<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReferralUnlockingIntervalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $intervals = [];

        // Generate referral unlocking intervals
        for ($i = 1; $i <= 10; $i++) { // Assuming 5 intervals
            $intervals[] = [
                'number_of_referents' => $i * 2, // Example: 2, 4, 6, 8, 10 referents
                'amount' => $i * 100.0, // Example: 100.00, 200.00, 300.00, 400.00, 500.00
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the database
        DB::table('referral_unlocking_intervals')->insert($intervals);
    }
}
