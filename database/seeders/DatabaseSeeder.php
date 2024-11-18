<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\TPSSeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RolesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            TPSSeder::class,  // Ensure the class is referenced correctly here
            UserSeeder::class,
            RolesTableSeeder::class // Other seeders as needed
        ]);
    }
}
