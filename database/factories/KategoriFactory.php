<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kategori>
 */
class KategoriFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kode_kategori' => fake()->unique()->bothify('KAT-###'),
            'nama_kategori' => fake()->unique()->randomElement([
                'Laptop',
                'Kamera',
                'Drone',
                'Kit Sensor IoT',
                'Server Mini',
                'Tablet',
                'Komputer Mini',
            ]),
        ];
    }
}