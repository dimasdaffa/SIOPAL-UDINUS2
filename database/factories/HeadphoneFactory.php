<?php

namespace Database\Factories;

use App\Models\Headphone;
use Illuminate\Database\Eloquent\Factories\Factory;

class HeadphoneFactory extends Factory
{
    protected $model = Headphone::class;

    public function definition(): array
    {
        return [
            'nama' => fake()->randomElement(['Logitech', 'HyperX', 'SteelSeries', 'Razer']) . ' ' .
                     fake()->randomElement(['H390', 'Cloud II', 'Arctis 5', 'Kraken']),
            'tipe' => fake()->randomElement(['On-ear', 'Over-ear', 'In-ear']),
            'koneksi' => fake()->randomElement(['Wired', 'Wireless', 'Bluetooth']),
            'mikrofon' => fake()->boolean(),
        ];
    }
}
