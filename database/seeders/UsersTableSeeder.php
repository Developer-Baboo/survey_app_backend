<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate fake data for users
        $users = [];
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $users[] = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'approved' => $faker->boolean,
                'referral_link' => $faker->url,
                'referral_share_count' => $faker->numberBetween(0, 100),
                'current_survey_id' => $faker->numberBetween(1, 10),
                'current_survey_deadline' => now(),
                'unlocked_amount' => $faker->randomFloat(2, 0, 1000),
                'language_id' => $faker->numberBetween(1, 5), // Assuming languages are already seeded
                'city' => $faker->city,
                'phone_number' => $faker->phoneNumber,
                'otp' => $faker->numerify('######'),
                'otp_expiry' => $faker->dateTimeBetween('now', '+1 day')->format('Y-m-d H:i:s'),
                'email' => $faker->unique()->safeEmail,
                'provider' => 'facebook', // Assuming users are registered via email
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // Default password for simplicity, should be securely generated
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the database
        DB::table('users')->insert($users);
    }
}
