<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'name' => 'Ser Charles Root',
            'email' => 'root@dev.com',
            'password' => Hash::make('root1234')
        ]);
        $superAdmin->assignRole('Super Admin');
 
        // Creating Admin User
        $admin = User::create([
            'name' => 'Mary Ann',
            'email' => 'ma@all.com',
            'password' => Hash::make('mary1234')
        ]);
        $admin->assignRole('Admin');


        // Creating Product Manager User
        $productManager = User::create([
            'name' => 'Tim Dog',
            'email' => 'tid@all.com',
            'password' => Hash::make('dog1234')
        ]);
        $productManager->assignRole('Product Manager');

        // Creating Application User
        $user = User::create([
            'name' => 'Sara Club',
            'email' => 'sara@all.com',
            'password' => Hash::make('sara1234')
        ]);
        $user->assignRole('User');
 
    }
}
