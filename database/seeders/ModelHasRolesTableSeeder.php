<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModelHasRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Define role assignments to models
       $modelRoleAssignments = [
        ['role_id' => 1, 'model_id' => 1], // Assign Role ID 1 to User ID 1
        ['role_id' => 2, 'model_id' => 2], // Assign Role ID 2 to User ID 2
        ['role_id' => 2, 'model_id' => 3], // Assign Role ID 2 to User ID 3
        // Add more assignments as needed
    ];

        // Insert data into the pivot table
        DB::table('model_has_roles')->insert($modelRoleAssignments);
    }
}
