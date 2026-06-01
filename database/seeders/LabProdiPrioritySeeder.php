<?php

namespace Database\Seeders;

use App\Models\Laboratorium;
use App\Models\Prodi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabProdiPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Data lab_prodi_priority sesuai siopalfull.sql:
     * (laboratorium_id, prodi_id, priority_level)
     *
     * SQL asli (pakai ID absolut):
     *   (1, lab_id=3,  prodi_id=1, level=1)  => D2A  - Teknik Informatika S1
     *   (2, lab_id=4,  prodi_id=1, level=1)  => D2B  - Teknik Informatika S1
     *   (3, lab_id=15, prodi_id=1, level=1)  => D3M  - Teknik Informatika S1
     *   (4, lab_id=6,  prodi_id=6, level=1)  => D2D  - Animasi S1
     *   (5, lab_id=6,  prodi_id=4, level=1)  => D2D  - DKV S1
     *   (6, lab_id=5,  prodi_id=6, level=1)  => D2C  - Animasi S1
     *   (7, lab_id=5,  prodi_id=4, level=1)  => D2C  - DKV S1
     *   (8, lab_id=5,  prodi_id=5, level=1)  => D2C  - FTV S1
     *
     * Kita mapping berdasarkan ruang & kode prodi agar tidak tergantung ID absolut.
     */
    public function run(): void
    {
        $priorities = [
            ['lab_ruang' => 'D2A', 'prodi_code' => 'A11', 'priority_level' => 1],
            ['lab_ruang' => 'D2B', 'prodi_code' => 'A11', 'priority_level' => 1],
            ['lab_ruang' => 'D3M', 'prodi_code' => 'A11', 'priority_level' => 1],
            ['lab_ruang' => 'D2D', 'prodi_code' => 'A17', 'priority_level' => 1],
            ['lab_ruang' => 'D2D', 'prodi_code' => 'A14', 'priority_level' => 1],
            ['lab_ruang' => 'D2C', 'prodi_code' => 'A17', 'priority_level' => 1],
            ['lab_ruang' => 'D2C', 'prodi_code' => 'A14', 'priority_level' => 1],
            ['lab_ruang' => 'D2C', 'prodi_code' => 'A16', 'priority_level' => 1],
        ];

        $inserted = 0;

        foreach ($priorities as $item) {
            $lab   = Laboratorium::where('ruang', $item['lab_ruang'])->first();
            $prodi = Prodi::whereRaw('TRIM(code) = ?', [trim($item['prodi_code'])])->first();

            if (! $lab) {
                $this->command->warn("Lab tidak ditemukan: {$item['lab_ruang']}");
                continue;
            }
            if (! $prodi) {
                $this->command->warn("Prodi tidak ditemukan: {$item['prodi_code']}");
                continue;
            }

            DB::table('lab_prodi_priority')->updateOrInsert(
                [
                    'laboratorium_id' => $lab->id,
                    'prodi_id'        => $prodi->id,
                ],
                [
                    'priority_level' => $item['priority_level'],
                    'created_at'     => null,
                    'updated_at'     => null,
                ]
            );

            $inserted++;
            $this->command->info("Priority: {$item['lab_ruang']} - {$item['prodi_code']}");
        }

        $this->command->info("LabProdiPriority seeder selesai: {$inserted} prioritas ditambahkan.");
    }
}
