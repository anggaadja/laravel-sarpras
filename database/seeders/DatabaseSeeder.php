<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call UserSeeder first (to create admin)
        $this->call(\Database\Seeders\UserSeeder::class);
        // Call only SarprasSeeder to restore original data
        $this->call(\Database\Seeders\SarprasSeeder::class);

    }
}
