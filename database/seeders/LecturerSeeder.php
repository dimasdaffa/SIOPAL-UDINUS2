<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Data dosen sesuai siopalfull.sql (3 dosen asli).
     * Ditambahkan beberapa dosen dummy untuk kelengkapan penjadwalan.
     */
    public function run(): void
    {
        $lecturers = [
            // Dosen asli dari SQL
            ['name' => 'Norenzo, S. Kom'],
            ['name' => 'DONY, M.KOM'],
            ['name' => 'NURBAGUS, M.KOM'],

            // Dosen dummy tambahan (untuk kebutuhan penjadwalan semua prodi)
            ['name' => 'Ahmad Zulfikar, S.Kom., M.Cs.'],
            ['name' => 'Budi Santoso, S.Kom., M.Cs.'],
            ['name' => 'Candra Wijaya, S.T., M.Kom.'],
            ['name' => 'Dewi Lestari, S.Kom., M.T.'],
            ['name' => 'Eko Prasetyo, S.Kom., M.Cs.'],
            ['name' => 'Fajar Nugroho, S.Kom., M.Cs.'],
            ['name' => 'Galih Purnomo, S.T., M.Kom.'],
            ['name' => 'Hendra Kusuma, S.Kom., M.Cs.'],
            ['name' => 'Indah Permatasari, S.Kom., M.T.'],
            ['name' => 'Joko Supriyanto, S.Kom., M.Cs.'],
            ['name' => 'Oktavian Darmawan, S.Sn., M.Ds.'],
            ['name' => 'Putri Rahayu, S.Sn., M.Ds.'],
            ['name' => 'Qori Hidayat, S.Sn., M.Sn.'],
            ['name' => 'Rizal Firmansyah, S.Sn., M.Ds.'],
            ['name' => 'Tri Wibowo, S.Sos., M.Si.'],
            ['name' => 'Vino Prasetya, S.Sn., M.Sn.'],
        ];

        foreach ($lecturers as $lecturer) {
            DB::table('lecturers')->updateOrInsert(
                ['name' => $lecturer['name']],
                array_merge($lecturer, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }

        $this->command->info('Lecturer seeder completed: ' . count($lecturers) . ' dosen.');
    }
}
