<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WithdrawalRequestStatusHistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Generate fake data for withdrawal request status history
        $statusValues = ['pending', 'approved', 'rejected', 'completed', 'failed'];
        $history = [];

        // Assuming you have withdrawal requests and users already seeded with IDs
        for ($i = 1; $i <= 10; $i++) { // Inserting 20 history entries
            $history[] = [
                'withdrawal_request_id' => $faker->numberBetween(1, 10), // Assuming withdrawal request IDs are from 1 to 10
                'editor_id' => $faker->numberBetween(1, 10), // Assuming user IDs are from 1 to 10
                'status' => $statusValues[array_rand($statusValues)],
                'date' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
                'note' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the database
        DB::table('withdrawal_request_status_history')->insert($history);
    }
}
