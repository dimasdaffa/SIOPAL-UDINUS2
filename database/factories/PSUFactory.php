<?php

namespace Database\Factories;

use App\Models\PSU;
use Illuminate\Database\Eloquent\Factories\Factory;

class PSUFactory extends Factory
{
    protected $model = PSU::class;

    public function definition(): array
    {
        return [
            'nama' => fake()->randomElement(['Corsair', 'EVGA', 'Seasonic', 'Thermaltake', 'be quiet!']) . ' ' .
                     fake()->randomElement(['VS', 'CX', 'RM', 'SuperNOVA', 'Focus']),
            'daya' => fake()->randomElement([450, 550, 650, 750, 850, 1000]) . 'W',
            'sertifikasi' => fake()->randomElement(['80+ White', '80+ Bronze', '80+ Gold', '80+ Platinum']),
            'modular' => fake()->randomElement(['Non-modular', 'Semi-modular', 'Fully-modular']),
        ];
    }
}
