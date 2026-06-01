<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AcademicPeriod;

class AcademicPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat periode default: 2025/2026 Genap
        AcademicPeriod::firstOrCreate(
            [
                'tahun_ajaran' => '2025/2026',
                'semester' => 'genap',
            ],
            [
                'is_active' => true,
            ]
        );

        // Buat periode arsip: 2025/2026 Ganjil
        AcademicPeriod::firstOrCreate(
            [
                'tahun_ajaran' => '2025/2026',
                'semester' => 'ganjil',
            ],
            [
                'is_active' => false,
            ]
        );
    }
}
