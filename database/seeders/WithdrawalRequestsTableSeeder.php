<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WithdrawalRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Generate fake data for withdrawal requests
        $withdrawalRequests = [];

        // Assuming you have users already seeded with IDs from 1 to 10
        for ($i = 1; $i <= 10; $i++) {
            $withdrawalRequests[] = [
                'surveyee_id' => $i, // Assuming user IDs are sequential
                'amount' => $faker->randomFloat(2, 10, 1000),
                'date' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
                'mobile_number' => $faker->phoneNumber,
                'wallet_balance' => $faker->randomFloat(2, 100, 10000),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the database
        DB::table('withdrawal_requests')->insert($withdrawalRequests);
    }
}
