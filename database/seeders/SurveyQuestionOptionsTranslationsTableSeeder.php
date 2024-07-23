<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveyQuestionOptionsTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Assuming you have survey questions already in the database
        $surveyQuestionIds = DB::table('survey_questions')->pluck('id')->toArray();

        $options = [];

        foreach ($surveyQuestionIds as $surveyQuestionId) {
            // Generate random number of options per question (between 2 and 5)
            $numberOfOptions = $faker->numberBetween(2, 5);

            for ($i = 1; $i <= $numberOfOptions; $i++) {
                $options[] = [
                    'survey_question_id' => $surveyQuestionId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert data into the database
        DB::table('survey_question_options')->insert($options);
    }
}
