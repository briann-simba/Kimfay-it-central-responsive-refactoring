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
$this->call(DepartmentSeeder::class);
$this->call(DivisionSeeder::class);
$this->call(DesignationSeeder::class);

        $User=User::factory()->create([
            'name' => 'it officer',
            'email' => 'it@example.com',
            'dep_id' => '1', // Assuming the department ID is 1
            'division_id' => '1', // Assuming the division ID is 1
            'designation_id' => '1', // Assuming the designation ID is 1
            'password' => '12345'
        ])->assignRole('It'); 
       
        $User=User::factory()->create([
            'name' => 'hr officer',
            'email' => 'hr@example.com',
            'dep_id' => '1',
            'division_id' => '2', // Assuming the division ID is 2
            'designation_id' => '1',
            'password' => '12345'
        ])->assignRole('Hr');

        $User=User::factory()->create([
            'name' => 'super admin',
            'email' => 'superadmin@example.com',
            'dep_id' => '2',
            'division_id' => '2', // Assuming the division ID is 2
            'designation_id' => '2', 
            'password' => '12345'
        ])->assignRole('SuperAdmin');

        $User=User::factory()->create([
            'name' => 'Line Manager',
            'email' => 'linemanager@example.com',
            'dep_id' => '2',
            'division_id' => '1', // Assuming the division ID is 1
            'designation_id' => '1', 
            'password' => '12345'
        ])->assignRole('LineManager');

        $User=User::factory()->create([
            'name' => 'Admin officer',
            'email' => 'adminofficer@example.com',
            'dep_id' => '1',
            'division_id' => '2', // Assuming the division ID is 2
            'designation_id' => '2',
            'password' => '12345'
        ])->assignRole('AdminOfficer');

        $User=User::factory()->create([
            'name' => 'finance officer',
            'email' => 'finance@example.com',
            'dep_id' => '1',
            'division_id' => '1', // Assuming the division ID is 1
            'designation_id' => '1', 
            'password' => '12345'
        ])->assignRole('Finance');

        $User=User::factory()->create([
            'name' => 'User Officer',
            'email' => 'user@example.com',
            'dep_id' => '1',
            'division_id' => '1', // Assuming the division ID is 1
            'designation_id' => '1', 
            'password' => '12345'
        ])->assignRole('User');
    $this->call(DeviceSeeder::class);

    }


}
