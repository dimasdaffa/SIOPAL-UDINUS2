<?php

namespace Database\Factories;

use App\Models\PCDetail;
use App\Models\Processor;
use App\Models\RAM;
use App\Models\Penyimpanan;
use App\Models\VGA;
use App\Models\PSU;
use App\Models\Monitor;
use App\Models\Mouse;
use App\Models\Keyboard;
use App\Models\DVD;
use App\Models\Motherboard;
use App\Models\Headphone;
use Illuminate\Database\Eloquent\Factories\Factory;

class PCDetailFactory extends Factory
{
    protected $model = PCDetail::class;

    public function definition(): array
    {
        return [
            'nama_pc' => 'PC-' . fake()->word(),
            'merek' => fake()->randomElement(['Dell', 'HP', 'Lenovo', 'Asus', 'Acer', 'Custom']),
            'tipe' => fake()->randomElement(['Desktop', 'All-in-One', 'Mini PC']),
            'motherboard_id' => Motherboard::factory(),
            'processor_id' => Processor::factory(),
            'ram_id' => RAM::factory(),
            'penyimpanan_id' => Penyimpanan::factory(),
            'vga_id' => VGA::factory(),
            'psu_id' => PSU::factory(),
            'monitor_id' => Monitor::factory(),
            'mouse_id' => Mouse::factory(),
            'keyboard_id' => Keyboard::factory(),
            'dvd_id' => DVD::factory(),
            'headphone_id' => Headphone::factory(),
            'tanggal_pembelian' => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'foto' => null, // We won't set a photo in the factory
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
