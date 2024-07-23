<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SurveyQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $surveyQuestions = [];

        // Assuming you have surveys already in the database
        $surveys = DB::table('surveys')->pluck('id')->toArray();

        // Define question types
        $questionTypes = ['number', 'text', 'options', 'date'];

        foreach ($surveys as $surveyId) {
            for ($i = 1; $i <= 10; $i++) { // Example: Inserting 5 questions per survey
                $surveyQuestions[] = [
                    'survey_id' => $surveyId,
                    'type' => $faker->randomElement($questionTypes),
                    'allow_multiple_answers' => $faker->boolean(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert data into the database
        DB::table('survey_questions')->insert($surveyQuestions);
    }
}
