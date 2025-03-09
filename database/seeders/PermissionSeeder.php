<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create-post',
            'edit-post',
            'delete-post',
            'create-user',
            'edit-user',
            'delete-user',
            'view-product',
            'create-product',
            'edit-product',
            'delete-product',
            'create-role',
            'edit-role',
            'delete-role',
        ];

        foreach($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
