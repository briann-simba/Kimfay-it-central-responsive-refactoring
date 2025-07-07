<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Division;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $division = Division::factory()->create([
            'name'=> 'Human Resources',
        ]);

        $division = Division::factory()->create([
            'name'=> 'IT',
        ]);
    }
}
