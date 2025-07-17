<?php

namespace Database\Factories;

use App\Models\Laboratorium;
use App\Models\KlasifikasiLab;
use Illuminate\Database\Eloquent\Factories\Factory;

class LaboratoriumFactory extends Factory
{
    protected $model = Laboratorium::class;

    public function definition(): array
    {
        return [
            'ruang' => 'D' . fake()->numberBetween(1, 5) . '.' . fake()->numberBetween(1, 9),
            'nama_lab' => 'Laboratorium ' . fake()->word(),
            'kapasitas' => fake()->numberBetween(20, 40),
            'klasifikasi_id' => function () {
                // Try to find an existing klasifikasi or create a new one if none exists
                $klasifikasi = KlasifikasiLab::first();
                return $klasifikasi ? $klasifikasi->id : KlasifikasiLab::factory()->create()->id;
            },
            'keterangan' => fake()->sentence(),
        ];
    }
}
