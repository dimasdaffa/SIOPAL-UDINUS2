<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaboratoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Data laboratorium sesuai isian database:
     * D2A  => PEMROGRAMAN (kapasitas 41)
     * D2B  => MULTIMEDIA  (kapasitas 42)
     * D2C  => MULTIMEDIA  (kapasitas 42)
     * D2D  => MULTIMEDIA  (kapasitas 42)
     * D2E  => DATABASE    (kapasitas 42)
     * D2G  => DATABASE    (kapasitas 42)  -- sesuai screenshot urutan D2E, D2G (alias D2F di tampilan? -- ikut data asli)
     * D2H  => DATABASE    (kapasitas 42)
     * D2I  => PEMROGRAMAN (kapasitas 42)
     * D2J  => PEMROGRAMAN (kapasitas 42)
     * D2K  => PEMROGRAMAN (kapasitas 42)
     * D3L  => DATABASE    (kapasitas 42)
     * D3M  => DATABASE    (kapasitas 42)
     * D3N  => PEMROGRAMAN (kapasitas 42)
     */
    public function run(): void
    {
        // Ambil ID kategori dari klasifikasi_labs
        $pmId = DB::table('klasifikasi_labs')->where('kode_kategori', 'PM')->value('id');
        $dbId = DB::table('klasifikasi_labs')->where('kode_kategori', 'DB')->value('id');
        $mmId = DB::table('klasifikasi_labs')->where('kode_kategori', 'MM')->value('id');

        if (! $pmId || ! $dbId || ! $mmId) {
            $this->command->error('KlasifikasiLab data not found! Run KlasifikasiLabSeeder first.');
            return;
        }

        $labs = [
            // Page 1 (urutan tampilan)
            ['kategori_id' => $pmId, 'ruang' => 'D2A', 'kapasitas' => 41],
            ['kategori_id' => $mmId, 'ruang' => 'D2B', 'kapasitas' => 42],
            ['kategori_id' => $mmId, 'ruang' => 'D2C', 'kapasitas' => 42],
            ['kategori_id' => $mmId, 'ruang' => 'D2D', 'kapasitas' => 42],
            ['kategori_id' => $dbId, 'ruang' => 'D2E', 'kapasitas' => 42],
            ['kategori_id' => $dbId, 'ruang' => 'D2G', 'kapasitas' => 42],
            ['kategori_id' => $dbId, 'ruang' => 'D2H', 'kapasitas' => 42],
            ['kategori_id' => $pmId, 'ruang' => 'D2I', 'kapasitas' => 42],
            ['kategori_id' => $pmId, 'ruang' => 'D2J', 'kapasitas' => 42],
            ['kategori_id' => $pmId, 'ruang' => 'D2K', 'kapasitas' => 42],
            // Page 2
            ['kategori_id' => $dbId, 'ruang' => 'D3L', 'kapasitas' => 42],
            ['kategori_id' => $dbId, 'ruang' => 'D3M', 'kapasitas' => 42],
            ['kategori_id' => $pmId, 'ruang' => 'D3N', 'kapasitas' => 42],
        ];

        foreach ($labs as $lab) {
            DB::table('laboratoria')->updateOrInsert(
                ['ruang' => $lab['ruang']],
                array_merge($lab, [
                    'pc_siap'         => 0,
                    'pc_backup'       => 0,
                    'keterangan'      => null,
                    'is_active'       => true,
                    'operating_start' => '07:00:00',
                    'operating_end'   => '21:00:00',
                    'created_at'      => now(),
                    'updated_at'      => now(),
                ])
            );
        }

        $this->command->info('Laboratoria seeder completed: ' . count($labs) . ' laboratorium.');
        $this->command->table(
            ['Ruang', 'Kategori ID', 'Kapasitas'],
            array_map(fn($l) => [$l['ruang'], $l['kategori_id'], $l['kapasitas']], $labs)
        );
    }
}
