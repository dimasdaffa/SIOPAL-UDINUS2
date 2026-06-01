<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlasifikasiLabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_kategori' => 'PM',
                'nama_kategori' => 'PEMROGRAMAN',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'kode_kategori' => 'DB',
                'nama_kategori' => 'DATABASE',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'kode_kategori' => 'MM',
                'nama_kategori' => 'MULTIMEDIA',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ];

        foreach ($data as $item) {
            DB::table('klasifikasi_labs')->updateOrInsert(
                ['kode_kategori' => $item['kode_kategori']],
                $item
            );
        }

        $this->command->info('KlasifikasiLab seeder completed: ' . count($data) . ' kategori.');
        $this->command->table(
            ['Kode Kategori', 'Nama Kategori'],
            array_map(fn($d) => [$d['kode_kategori'], $d['nama_kategori']], $data)
        );
    }
}
