<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveyResponsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Assuming you have surveys_users, survey_questions, and survey_question_options already in the database
        $surveysUsersIds = DB::table('surveys_users')->pluck('id')->toArray();
        $surveyQuestionIds = DB::table('survey_questions')->pluck('id')->toArray();
        $surveyQuestionOptionIds = DB::table('survey_question_options')->pluck('id')->toArray();

        $surveyResponses = [];

        foreach ($surveysUsersIds as $surveysUsersId) {
            // Randomly choose a survey question to respond to
            $surveyQuestionId = $faker->randomElement($surveyQuestionIds);

            // Determine if the question type requires an option or text response
            $questionType = DB::table('survey_questions')->where('id', $surveyQuestionId)->value('type');

            if ($questionType == 'options') {
                // For options type, randomly choose an option
                $surveyQuestionOptionId = $faker->randomElement($surveyQuestionOptionIds);
                $text = null; // No text response for options type
            } else {
                // For other types (number, text, date), generate a random text response
                $surveyQuestionOptionId = null;
                $text = $faker->text;
            }

            $surveyResponses[] = [
                'surveys_users_id' => $surveysUsersId,
                'survey_question_id' => $surveyQuestionId,
                'survey_question_option_id' => $surveyQuestionOptionId,
                'text' => $text,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the database
        DB::table('survey_responses')->insert($surveyResponses);
    }
}
