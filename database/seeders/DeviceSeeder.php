<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Device;
class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $device = Device::factory()->create([
            'user_id'=> 1, // Assuming user with ID 1 exists'',
            'name' => 'Dell XPS 13',
            'color' => 'Silver',
            'category' => 'laptop',
            'value' => 1000,
        ]);
        $device = Device::factory()->create([
            'user_id'=> 2, // Assuming user with ID 2 exists
            'name' => 'Apple iPhone 14',
            'color' => 'Black',
            'category' => 'smartphone',
            'value' => 1200,
        ]);
        $device = Device::factory()->create([
            'user_id'=> 3, // Assuming user with ID 3 exists
            'name' => 'Samsung Galaxy S21',
            'color' => 'Blue',
            'category' => 'smartphone',
            'value' => 800,
        ]);
        $device = Device::factory()->create([
            'user_id'=> 4, // Assuming user with ID 4 exists
            'name' => 'HP Spectre x360',
            'color' => 'Gold',
            'category' => 'laptop',
            'value' => 1500,
        ]);
        $device = Device::factory()->create([
            'user_id'=> 5, // Assuming user with ID 5 exists
            'name' => 'Sony WH-1000XM4',
            'color' => 'Black',
            'category' => 'headphones',
            'value' => 350,
        ]);
        $device = Device::factory()->create([
            'user_id'=> 6, // Assuming user with ID 6 exists
            'name' => 'Apple MacBook Pro',
            'color' => 'Space Gray',
            'category' => 'laptop',
            'value' => 2000,
        ]);
    }
}
