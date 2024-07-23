<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SurveyQuestionsTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Assuming you have survey questions and languages already in the database
        $surveyQuestionIds = DB::table('survey_questions')->pluck('id')->toArray();
        $languageIds = DB::table('languages')->pluck('id')->toArray();

        $translations = [];

        foreach ($surveyQuestionIds as $surveyQuestionId) {
            foreach ($languageIds as $languageId) {
                $translations[] = [
                    'survey_question_id' => $surveyQuestionId,
                    'language_id' => $languageId,
                    'text' => $faker->sentence,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert data into the database
        DB::table('survey_questions_translations')->insert($translations);
    }
}
