<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
            
        //     'username' => 'inaa',
        //     'password' => Hash::make('123'), // Hash the password
        // ]);

        DB::table('users')->insert([
            'username' => 'inaa',
            'password' => Hash::make('123'), // Hash the password
        ]);
    }
}
