<?php

namespace Database\Factories;

use App\Models\KlasifikasiLab;
use Illuminate\Database\Eloquent\Factories\Factory;

class KlasifikasiLabFactory extends Factory
{
    protected $model = KlasifikasiLab::class;

    public function definition(): array
    {
        return [
            'nama' => 'Laboratorium ' . fake()->randomElement(['Komputer', 'Jaringan', 'Multimedia', 'Programming', 'Database']),
            'keterangan' => fake()->sentence(),
        ];
    }
}
