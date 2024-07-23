<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveysUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Assuming you have users and surveys already in the database
        $userIds = DB::table('users')->pluck('id')->toArray();
        $surveyIds = DB::table('surveys')->pluck('id')->toArray();

        $surveysUsers = [];

        foreach ($userIds as $userId) {
            // Randomly assign multiple surveys to each user (between 1 and 3 surveys per user)
            $numberOfSurveys = $faker->numberBetween(1, 3);

            // Ensure we do not assign the same survey to a user multiple times
            $assignedSurveys = [];

            for ($i = 0; $i < $numberOfSurveys; $i++) {
                $surveyId = $faker->randomElement($surveyIds);

                // Check if the survey has already been assigned to this user
                while (in_array($surveyId, $assignedSurveys)) {
                    $surveyId = $faker->randomElement($surveyIds);
                }

                $assignedSurveys[] = $surveyId;

                $surveysUsers[] = [
                    'surveyee_id' => $userId,
                    'survey_id' => $surveyId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert data into the database
        DB::table('surveys_users')->insert($surveysUsers);
    }
}
