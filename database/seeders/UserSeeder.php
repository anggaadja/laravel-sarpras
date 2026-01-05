<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if user exists to avoid duplicates
        $exists = DB::table('users')->where('email', 'avrisna@studi.id')->exists();

        if (!$exists) {
            DB::table('users')->insert([
                'name' => 'Admin Sarpras',
                'email' => 'avrisna@studi.id',
                'password' => Hash::make('1sampai10'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
