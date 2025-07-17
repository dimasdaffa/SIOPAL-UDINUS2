<?php

namespace Database\Factories;

use App\Models\RAM;
use Illuminate\Database\Eloquent\Factories\Factory;

class RAMFactory extends Factory
{
    protected $model = RAM::class;

    public function definition(): array
    {
        return [
            'nama' => fake()->randomElement(['Corsair Vengeance', 'G.Skill Ripjaws', 'Kingston HyperX', 'Crucial Ballistix']),
            'tipe' => fake()->randomElement(['DDR4', 'DDR5']),
            'kapasitas' => fake()->randomElement([4, 8, 16, 32]) . 'GB',
            'kecepatan' => fake()->randomElement(['2400', '2666', '3200', '3600', '4800']) . 'MHz',
        ];
    }
}
