<?php

namespace Database\Factories;

use App\Models\Keyboard;
use Illuminate\Database\Eloquent\Factories\Factory;

class KeyboardFactory extends Factory
{
    protected $model = Keyboard::class;

    public function definition(): array
    {
        return [
            'nama' => fake()->randomElement(['Logitech', 'Corsair', 'Razer', 'SteelSeries']) . ' ' .
                     fake()->randomElement(['K120', 'K480', 'K380', 'G213', 'K55']),
            'tipe' => fake()->randomElement(['Membrane', 'Mechanical', 'Scissor']),
            'koneksi' => fake()->randomElement(['Wired', 'Wireless', 'Bluetooth']),
        ];
    }
}
