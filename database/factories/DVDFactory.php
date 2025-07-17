<?php

namespace Database\Factories;

use App\Models\DVD;
use Illuminate\Database\Eloquent\Factories\Factory;

class DVDFactory extends Factory
{
    protected $model = DVD::class;

    public function definition(): array
    {
        return [
            'nama' => fake()->randomElement(['Asus', 'LG', 'Samsung', 'Pioneer']) . ' DVD ' .
                     fake()->randomElement(['Writer', 'Reader']),
            'kecepatan' => fake()->randomElement(['8x', '16x', '24x']),
            'tipe' => fake()->randomElement(['Internal', 'External']),
        ];
    }
}
