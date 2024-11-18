<?php

namespace Database\Seeders;

use App\Models\TPS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),  // Make sure to hash the password
            'role' => 'admin',
            'tps_id' => null, // Admin does not need a TPS
        ]);

        // Example of creating a witness user
        User::create([
            'name' => 'Witness User',
            'email' => 'witness@example.com',
            'password' => Hash::make('password123'), // Hash the password
            'role' => 'witness',
            'tps_id' => TPS::first()->id, // Assign a valid TPS ID (you can update this logic as needed)
        ]);
    }
}
