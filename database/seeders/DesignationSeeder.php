<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Designation;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designation = Designation::factory()->create([
            'name' => 'Human Resources Manager',
        ]);

        $designation = Designation::factory()->create([
            'name' => 'IT Manager',
        ]);
    }
}
