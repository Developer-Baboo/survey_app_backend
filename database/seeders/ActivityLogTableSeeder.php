<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ActivityLogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Generate fake data for activity log
        $scopeIds = ['users', 'settings'];
        $actions = ['list', 'create', 'edit', 'delete', 'pushed', 'enable', 'disable', 'csv_export', 'view_answers', 'view_history'];
        $logEntries = [];

        // Assuming you have users already seeded with IDs from 1 to 10
        for ($i = 1; $i <= 50; $i++) { // Inserting 50 log entries
            $logEntries[] = [
                'date' => now(),
                'editor_id' => $faker->numberBetween(1, 10), // Assuming user IDs are from 1 to 10
                'scope_id' => $scopeIds[array_rand($scopeIds)],
                'action' => $actions[array_rand($actions)],
                'entity_id' => $faker->numberBetween(1, 20), // Assuming entity IDs exist and are from 1 to 20
                'ip_address' => $faker->ipv4,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the database
        DB::table('activity_log')->insert($logEntries);
    }
}
