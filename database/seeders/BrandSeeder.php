<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Super brand',
                'description' => 'Super brand description'
            ],
            [
                'name' => 'Cats brand',
                'description' => 'Cats brand description'
            ],
            [
                'name' => 'Dogs brand',
                'description' => 'Dogs brand description'
            ],
        ];
        //
        foreach ($brands as $brand){
            \DB::insert("INSERT INTO brands (name, description, created_at, updated_at) VALUES (?,?,?,?)", [
                $brand['name'],
                $brand['description'],
                now(),
                now()
            ]);
        }
    }
}
