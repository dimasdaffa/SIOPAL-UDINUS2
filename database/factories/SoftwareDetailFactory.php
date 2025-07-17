<?php

namespace Database\Factories;

use App\Models\SoftwareDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class SoftwareDetailFactory extends Factory
{
    protected $model = SoftwareDetail::class;

    public function definition(): array
    {
        return [
            'nama' => fake()->randomElement(['Windows', 'Office', 'Adobe', 'Visual Studio', 'MySQL']) . ' ' . fake()->numberBetween(10, 23),
            'versi' => fake()->semver(),
            'keterangan' => fake()->paragraph(1),
        ];
    }
}
