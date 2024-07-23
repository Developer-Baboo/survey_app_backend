<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Define notification types
        $notificationTypes = [
            'wallet_withdrawal_request',
            'new_survey_availabile',
            'max_invites_reached',
        ];

        $notifications = [];

        // Assuming you have users already seeded with IDs from 1 to 10
        for ($i = 1; $i <= 10; $i++) { // Inserting 20 notifications
            $notifications[] = [
                'targeted_user_id' => $faker->numberBetween(1, 10), // Assuming user IDs are from 1 to 10
                'target_entity_id' => $faker->numberBetween(1, 10), // Assuming entity IDs exist and are from 1 to 100
                'type' => $notificationTypes[$faker->numberBetween(0, 2)], // Randomly select a notification type
                'viewed_at' => now(),
                'opened_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the database
        DB::table('notifications')->insert($notifications);
    }
}
