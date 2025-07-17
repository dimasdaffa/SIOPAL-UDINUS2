<?php

namespace Database\Factories;

use App\Models\VGA;
use Illuminate\Database\Eloquent\Factories\Factory;

class VGAFactory extends Factory
{
    protected $model = VGA::class;

    public function definition(): array
    {
        return [
            'nama' => fake()->randomElement(['NVIDIA GeForce RTX', 'NVIDIA GeForce GTX', 'AMD Radeon RX']) . ' ' .
                     fake()->randomElement(['3050', '3060', '3070', '2060', '1660', '6600', '6700']),
            'kapasitas' => fake()->randomElement([4, 6, 8, 10, 12]) . 'GB',
            'tipe' => fake()->randomElement(['GDDR6', 'GDDR5']),
        ];
    }
}
