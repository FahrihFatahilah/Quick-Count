<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TPS;
use Carbon\Carbon; // Optional: for timestamps

class TPSSeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TPS::create([
            'location_name' => 'AMBA-SLASSER',  // Custom location
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        TPS::create([
            'location_name' => 'Ngawi District',  // Example location
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
