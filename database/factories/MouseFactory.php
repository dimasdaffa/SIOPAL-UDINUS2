<?php

namespace Database\Factories;

use App\Models\Mouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class MouseFactory extends Factory
{
    protected $model = Mouse::class;

    public function definition(): array
    {
        return [
            'nama' => fake()->randomElement(['Logitech', 'Corsair', 'Razer', 'SteelSeries']) . ' ' .
                     fake()->randomElement(['M170', 'M220', 'G102', 'G304', 'Harpoon']),
            'tipe' => fake()->randomElement(['Optical', 'Laser', 'BlueTrack']),
            'koneksi' => fake()->randomElement(['Wired', 'Wireless', 'Bluetooth']),
            'dpi' => fake()->randomElement([1000, 1600, 3200, 8000, 12000]),
        ];
    }
}
