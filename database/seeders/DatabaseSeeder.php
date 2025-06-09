<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $User=User::factory()->create([
            'name' => 'Dennis Kememwa',
            'email' => 'dennis@example.com',
            'password' => '12345'
        ])->assignRole('It'); 
       
    }
}
