<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Data dosen dummy untuk keperluan penjadwalan.
     * Nama-nama ini adalah contoh fiktif representatif untuk
     * tiap program studi di UDINUS.
     */
    public function run(): void
    {
        $lecturers = [
            // Teknik Informatika & Sistem Informasi
            ['name' => 'Dr. Ahmad Zulfikar, S.Kom., M.Cs.'],
            ['name' => 'Budi Santoso, S.Kom., M.Cs.'],
            ['name' => 'Candra Wijaya, S.T., M.Kom.'],
            ['name' => 'Dewi Lestari, S.Kom., M.T.'],
            ['name' => 'Eko Prasetyo, S.Kom., M.Cs.'],
            ['name' => 'Fajar Nugroho, S.Kom., M.Cs.'],
            ['name' => 'Galih Purnomo, S.T., M.Kom.'],
            ['name' => 'Hendra Kusuma, S.Kom., M.Cs.'],
            ['name' => 'Indah Permatasari, S.Kom., M.T.'],
            ['name' => 'Joko Supriyanto, S.Kom., M.Cs.'],
            ['name' => 'Kurniawan Rahmat, S.Kom., M.Kom.'],
            ['name' => 'Lina Fitria, S.Kom., M.Cs.'],
            ['name' => 'Muhammad Rizky, S.T., M.Kom.'],
            ['name' => 'Novia Andriani, S.Kom., M.Cs.'],
            // DKV & Animasi & Multimedia
            ['name' => 'Oktavian Darmawan, S.Sn., M.Ds.'],
            ['name' => 'Putri Rahayu, S.Sn., M.Ds.'],
            ['name' => 'Qori Hidayat, S.Sn., M.Sn.'],
            ['name' => 'Rizal Firmansyah, S.Sn., M.Ds.'],
            ['name' => 'Sari Dewi, S.Sn., M.Sn.'],
            // Ilmu Komunikasi & FTV
            ['name' => 'Tri Wibowo, S.Sos., M.Si.'],
            ['name' => 'Umi Kalsum, S.Sos., M.Si.'],
            ['name' => 'Vino Prasetya, S.Sn., M.Sn.'],
            // DTI (D3)
            ['name' => 'Wahyu Setiawan, S.Kom., M.Kom.'],
            ['name' => 'Yuliana Kartika, S.Kom., M.Cs.'],
            ['name' => 'Zainudin Arif, S.Kom., M.Kom.'],
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
