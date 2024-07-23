<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions
        $permissions = [
            ['name' => 'create_users'],
            ['name' => 'edit_users'],
            ['name' => 'delete_users'],
            ['name' => 'view_users'],
            ['name' => 'create_settings'],
            ['name' => 'edit_settings'],
            ['name' => 'delete_settings'],
            ['name' => 'view_settings'],
        ];

        // Insert data into the database
        DB::table('permissions')->insert($permissions);
    }
}
