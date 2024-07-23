<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define settings data
        $settings = [
            ['key' => 'first_survey_reward', 'value' => '10'], // Example value, adjust as needed
            ['key' => 'invite_reward', 'value' => '5'],
            ['key' => 'max_invites_with_reward', 'value' => '20'],
        ];

        // Insert data into the database
        DB::table('settings')->insert($settings);
    }
}
