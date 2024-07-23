<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ReferralsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $referrals = [];

        // Generate referral relationships
        for ($i = 1; $i <= 10; $i++) { // Assuming 20 referral relationships
            $referrerId = $faker->numberBetween(1, 10); // Assuming user IDs from 1 to 10
            $referentId = $faker->unique()->numberBetween(1, 10); // Assuming user IDs from 1 to 10, and unique referent IDs

            // Ensure referrer and referent are not the same user
            while ($referrerId === $referentId) {
                $referentId = $faker->numberBetween(1, 10);
            }

            $referrals[] = [
                'referrer_id' => $referrerId,
                'referent_id' => $referentId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the database
        DB::table('referrals')->insert($referrals);
    }
}
