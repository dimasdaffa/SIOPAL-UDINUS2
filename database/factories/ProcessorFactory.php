<?php

namespace Database\Factories;

use App\Models\Processor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcessorFactory extends Factory
{
    protected $model = Processor::class;

    public function definition(): array
    {
        return [
            'nama' => fake()->randomElement(['Intel Core i3', 'Intel Core i5', 'Intel Core i7', 'AMD Ryzen 5', 'AMD Ryzen 7']) . ' ' .
                     fake()->randomElement(['10100', '11400F', '12700K', '5600X', '5800X']),
            'socket' => fake()->randomElement(['AM4', 'LGA1200', 'LGA1700']),
            'kecepatan' => fake()->randomFloat(1, 2.5, 5.0) . ' GHz',
            'core' => fake()->numberBetween(4, 16),
            'thread' => function (array $attributes) {
                return $attributes['core'] * 2; // Typically 2 threads per core
            },
        ];
    }
}
