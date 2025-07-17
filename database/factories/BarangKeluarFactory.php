<?php

namespace Database\Factories;

use App\Models\BarangKeluar;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangKeluarFactory extends Factory
{
    protected $model = BarangKeluar::class;

    public function definition(): array
    {
        return [
            'nama_barang' => fake()->words(3, true),
            'jenis' => fake()->randomElement(['Hardware', 'Software', 'Aksesoris', 'Consumable']),
            'jumlah' => fake()->numberBetween(1, 10),
            'tanggal' => fake()->date(),
            'tujuan' => 'Lab ' . fake()->bothify('D#.##'),
            'catatan' => fake()->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
