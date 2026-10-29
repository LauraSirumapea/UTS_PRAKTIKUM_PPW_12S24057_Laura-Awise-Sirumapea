<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment>
 */
class EquipmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'asset_code' => fake()->unique()->numerify('EQP-########'),
            'name' => fake()->sentence(3),
            'specification' => fake()->paragraph(),
            'daily_rental_fee' => fake()->randomFloat(2, 10000, 100000),
            'condition' => fake()->randomElement(['baik', 'rusak']),
            'status' => fake()->randomElement(['tersedia', 'dipinjam', 'diperbaiki']),
        ];
    }
}