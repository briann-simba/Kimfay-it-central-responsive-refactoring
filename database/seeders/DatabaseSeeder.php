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
$this->call(RolesAndPermissionsSeeder::class);
        $User=User::factory()->create([
            'name' => 'it officer',
            'email' => 'it@example.com',
            'password' => '12345'
        ])->assignRole('It'); 
       
        $User=User::factory()->create([
            'name' => 'hr officer',
            'email' => 'hr@example.com',
            'password' => '12345'
        ])->assignRole('Hr');

        $User=User::factory()->create([
            'name' => 'super admin',
            'email' => 'superadmin@example.com',
            'password' => '12345'
        ])->assignRole('SuperAdmin');

        $User=User::factory()->create([
            'name' => 'Line Manager',
            'email' => 'linemanager@example.com',
            'password' => '12345'
        ])->assignRole('LineManager');

        $User=User::factory()->create([
            'name' => 'Admin officer',
            'email' => 'adminofficer@example.com',
            'password' => '12345'
        ])->assignRole('AdminOfficer');

        $User=User::factory()->create([
            'name' => 'finance officer',
            'email' => 'finance@example.com',
            'password' => '12345'
        ])->assignRole('Finance');

        $User=User::factory()->create([
            'name' => 'User Officer',
            'email' => 'user@example.com',
            'password' => '12345'
        ])->assignRole('User');
    }
}
