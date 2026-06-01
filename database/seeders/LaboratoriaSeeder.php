<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaboratoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Data laboratorium PERSIS sesuai siopalfull.sql:
     * (id, kategori_id, ruang, kapasitas, pc_siap, pc_backup, keterangan, is_active, operating_start, operating_end)
     *
     * Mapping kategori_id di SQL asli:
     *   kategori_id=2 => PM (PEMROGRAMAN)
     *   kategori_id=4 => DB (DATABASE)
     *   kategori_id=5 => MM (MULTIMEDIA)
     */
    public function run(): void
    {
        // Ambil ID kategori dari DB (karena ID auto-increment bisa beda)
        $pmId = DB::table('klasifikasi_labs')->where('kode_kategori', 'PM')->value('id');
        $dbId = DB::table('klasifikasi_labs')->where('kode_kategori', 'DB')->value('id');
        $mmId = DB::table('klasifikasi_labs')->where('kode_kategori', 'MM')->value('id');

        if (! $pmId || ! $dbId || ! $mmId) {
            $this->command->error('KlasifikasiLab data tidak ditemukan! Jalankan KlasifikasiLabSeeder terlebih dahulu.');
            return;
        }

        // Data sesuai SQL asli (ruang, kategori, kapasitas, pc_siap, pc_backup)
        $labs = [
            ['ruang' => 'D2A', 'kategori_id' => $pmId, 'kapasitas' => 41, 'pc_siap' => 40, 'pc_backup' => 1],
            ['ruang' => 'D2B', 'kategori_id' => $mmId, 'kapasitas' => 42, 'pc_siap' => 40, 'pc_backup' => 2],
            ['ruang' => 'D2C', 'kategori_id' => $mmId, 'kapasitas' => 42, 'pc_siap' => 41, 'pc_backup' => 1],
            ['ruang' => 'D2D', 'kategori_id' => $mmId, 'kapasitas' => 42, 'pc_siap' => 41, 'pc_backup' => 1],
            ['ruang' => 'D2E', 'kategori_id' => $dbId, 'kapasitas' => 42, 'pc_siap' => 41, 'pc_backup' => 1],
            ['ruang' => 'D2G', 'kategori_id' => $dbId, 'kapasitas' => 42, 'pc_siap' => 41, 'pc_backup' => 1],
            ['ruang' => 'D2H', 'kategori_id' => $dbId, 'kapasitas' => 42, 'pc_siap' => 41, 'pc_backup' => 1],
            ['ruang' => 'D2I', 'kategori_id' => $pmId, 'kapasitas' => 42, 'pc_siap' => 41, 'pc_backup' => 1],
            ['ruang' => 'D2J', 'kategori_id' => $pmId, 'kapasitas' => 42, 'pc_siap' => 41, 'pc_backup' => 1],
            ['ruang' => 'D2K', 'kategori_id' => $pmId, 'kapasitas' => 42, 'pc_siap' => 41, 'pc_backup' => 1],
            ['ruang' => 'D3L', 'kategori_id' => $dbId, 'kapasitas' => 42, 'pc_siap' => 41, 'pc_backup' => 1],
            ['ruang' => 'D3M', 'kategori_id' => $dbId, 'kapasitas' => 42, 'pc_siap' => 41, 'pc_backup' => 1],
            ['ruang' => 'D3N', 'kategori_id' => $pmId, 'kapasitas' => 42, 'pc_siap' => 41, 'pc_backup' => 1],
        ];

        foreach ($labs as $lab) {
            DB::table('laboratoria')->updateOrInsert(
                ['ruang' => $lab['ruang']],
                array_merge($lab, [
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
            ['Ruang', 'Kategori', 'Kapasitas', 'PC Siap', 'PC Backup'],
            array_map(fn($l) => [
                $l['ruang'],
                $l['kategori_id'] === $pmId ? 'PM' : ($l['kategori_id'] === $dbId ? 'DB' : 'MM'),
                $l['kapasitas'],
                $l['pc_siap'],
                $l['pc_backup'],
            ], $labs)
        );
    }
}
