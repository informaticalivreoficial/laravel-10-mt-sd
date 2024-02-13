<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PlanTableSeeder::class,
            TenantTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
