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
            'name' => 'Dell XPS 13',
            'color' => 'Silver',
            'category' => 'laptop',
            'value' => 1000,
        ]);
        $device = Device::factory()->create([
            'name' => 'Apple iPhone 14',
            'color' => 'Black',
            'category' => 'smartphone',
            'value' => 1200,
        ]);
        $device = Device::factory()->create([
            'name' => 'Samsung Galaxy S21',
            'color' => 'Blue',
            'category' => 'smartphone',
            'value' => 800,
        ]);
        $device = Device::factory()->create([
            'name' => 'HP Spectre x360',
            'color' => 'Gold',
            'category' => 'laptop',
            'value' => 1500,
        ]);
        $device = Device::factory()->create([
            'name' => 'Sony WH-1000XM4',
            'color' => 'Black',
            'category' => 'headphones',
            'value' => 350,
        ]);
        $device = Device::factory()->create([
            'name' => 'Apple MacBook Pro',
            'color' => 'Space Gray',
            'category' => 'laptop',
            'value' => 2000,
        ]);
    }
}
