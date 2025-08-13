<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DepartmentFactory extends Factory
{
    protected $model = \App\Models\Department::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'hod_id' => 1, // or use User::factory() if you want a related user
            'slug' => fn(array $attributes) => Str::slug($attributes['name']),
            'status' => 'active',
        ];
    }
}
