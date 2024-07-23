<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define role-permission relationships
        $rolePermissions = [
            // Example relationships:
            ['role_id' => 1, 'permission_id' => 1], // Role ID 1 has Permission ID 1
            ['role_id' => 1, 'permission_id' => 2], // Role ID 1 has Permission ID 2
            ['role_id' => 2, 'permission_id' => 3], // Role ID 2 has Permission ID 3
        ];

        // Insert data into the pivot table
        DB::table('role_has_permissions')->insert($rolePermissions);
    }
}
