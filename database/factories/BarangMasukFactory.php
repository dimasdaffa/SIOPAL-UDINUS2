<?php

namespace Database\Factories;

use App\Models\BarangMasuk;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangMasukFactory extends Factory
{
    protected $model = BarangMasuk::class;

    public function definition(): array
    {
        return [
            'nama_barang' => fake()->words(3, true),
            'jenis' => fake()->randomElement(['Hardware', 'Software', 'Aksesoris', 'Consumable']),
            'jumlah' => fake()->numberBetween(1, 50),
            'tanggal' => fake()->date(),
            'supplier' => fake()->company(),
            'catatan' => fake()->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
