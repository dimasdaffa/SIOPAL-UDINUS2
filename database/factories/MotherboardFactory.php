<?php

namespace Database\Factories;

use App\Models\Motherboard;
use Illuminate\Database\Eloquent\Factories\Factory;

class MotherboardFactory extends Factory
{
    protected $model = Motherboard::class;

    public function definition(): array
    {
        return [
            'nama' => fake()->randomElement(['ASUS', 'MSI', 'Gigabyte', 'ASRock']) . ' ' .
                     fake()->randomElement(['B450', 'B550', 'H510', 'Z590', 'X570']),
            'socket' => fake()->randomElement(['AM4', 'LGA1200', 'LGA1700']),
            'chipset' => fake()->randomElement(['B450', 'B550', 'H510', 'Z590', 'X570']),
        ];
    }
}
