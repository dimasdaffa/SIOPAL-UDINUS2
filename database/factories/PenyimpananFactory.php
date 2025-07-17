<?php

namespace Database\Factories;

use App\Models\Penyimpanan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenyimpananFactory extends Factory
{
    protected $model = Penyimpanan::class;

    public function definition(): array
    {
        return [
            'nama' => fake()->randomElement(['Samsung', 'Western Digital', 'Seagate', 'Kingston', 'Crucial']) . ' ' .
                     fake()->randomElement(['860 EVO', '970 EVO Plus', 'Blue', 'Barracuda', 'A2000']),
            'tipe' => fake()->randomElement(['SSD', 'HDD', 'M.2 NVMe']),
            'kapasitas' => fake()->randomElement([128, 256, 512, 1000, 2000]) . 'GB',
        ];
    }
}
