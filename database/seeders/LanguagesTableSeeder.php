<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define data to insert
        $languages = [
            ['name' => 'English', 'iso_code' => 'en'],
            ['name' => 'Spanish', 'iso_code' => 'es'],
            ['name' => 'French', 'iso_code' => 'fr'],
            ['name' => 'German', 'iso_code' => 'de'],
            ['name' => 'Chinese', 'iso_code' => 'zh'],
        ];

        // Insert data into the database
        DB::table('languages')->insert($languages);
    }
}
