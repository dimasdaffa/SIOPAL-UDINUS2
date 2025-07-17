<?php

namespace Database\Factories;

use App\Models\NonPCDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class NonPCDetailFactory extends Factory
{
    protected $model = NonPCDetail::class;

    public function definition(): array
    {
        return [
            'nama' => fake()->randomElement(['Printer', 'Scanner', 'Projector', 'Router', 'Switch']),
            'model' => fake()->word() . ' ' . fake()->numberBetween(100, 999),
            'spesifikasi' => fake()->paragraph(1),
        ];
    }
}
