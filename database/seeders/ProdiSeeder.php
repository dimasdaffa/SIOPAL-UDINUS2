<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Data program studi sesuai tampilan:
     *  - Teknik Informatika - S1  => A11
     *  - Ilmu Komunikasi - S1     => A15
     *  - Sistem Informasi - S1    => A12
     *  - DKV - S1                 => A14
     *  - FTV - S1                 => A16
     *  - Animasi - S1             => A17
     *  - Teknik Informatika - D3  => A22
     */
    public function run(): void
    {
        $prodis = [
            ['name' => 'Teknik Informatika - S1', 'code' => 'A11'],
            ['name' => 'Ilmu Komunikasi - S1',    'code' => 'A15'],
            ['name' => 'Sistem Informasi - S1',   'code' => 'A12'],
            ['name' => 'DKV - S1',                'code' => 'A14'],
            ['name' => 'FTV - S1',                'code' => 'A16'],
            ['name' => 'Animasi - S1',             'code' => 'A17'],
            ['name' => 'Teknik Informatika - D3',  'code' => 'A22'],
        ];

        foreach ($prodis as $prodi) {
            DB::table('prodis')->updateOrInsert(
                ['code' => $prodi['code']],
                array_merge($prodi, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }

        $this->command->info('Prodi seeder completed: ' . count($prodis) . ' program studi.');
        $this->command->table(
            ['Nama Program Studi', 'Kode Prodi'],
            array_map(fn($p) => [$p['name'], $p['code']], $prodis)
        );
    }
}
