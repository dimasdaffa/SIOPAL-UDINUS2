<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Prodi;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Data mata kuliah PERSIS sesuai siopalfull.sql tabel courses.
     * Catatan: beberapa code di SQL asli memiliki leading space (misal ' A11.64404').
     * Kita normalisasi (trim) agar konsisten.
     */
    public function run(): void
    {
        // Ambil prodi berdasarkan code (trim karena SQL juga punya leading space)
        $prodis = Prodi::all()->keyBy(fn($p) => trim($p->code));

        $prodiA11 = $prodis['A11']?->id;
        $prodiA12 = $prodis['A12']?->id;
        $prodiA14 = $prodis['A14']?->id;
        $prodiA15 = $prodis['A15']?->id;
        $prodiA16 = $prodis['A16']?->id;
        $prodiA17 = $prodis['A17']?->id;
        $prodiA22 = $prodis['A22']?->id;

        // Data sesuai SQL asli (id, code, name, sks, prodi_id)
        // Code di-trim agar konsisten
        $courses = [
            // A11 - Teknik Informatika S1
            ['code' => 'A11.64404', 'name' => 'Pemrograman Web Lanjut',          'sks' => 2, 'prodi_id' => $prodiA11],
            ['code' => 'A11.64204', 'name' => 'Algoritma Dan Struktur Data',      'sks' => 2, 'prodi_id' => $prodiA11],
            ['code' => 'A11.64403', 'name' => 'Pemrograman Berorientasi Objek',   'sks' => 2, 'prodi_id' => $prodiA11],
            ['code' => 'A11.64406', 'name' => 'Sistem Basis Data',                'sks' => 2, 'prodi_id' => $prodiA11],
            ['code' => 'A11.64706', 'name' => 'Pemrograman Sisi Klien',           'sks' => 3, 'prodi_id' => $prodiA11],
            ['code' => 'A11.64707', 'name' => 'Pemrograman Sisi Server',          'sks' => 3, 'prodi_id' => $prodiA11],
            ['code' => 'A11.64710', 'name' => 'Pemrograman Game',                 'sks' => 3, 'prodi_id' => $prodiA11],

            // A12 - Sistem Informasi S1
            ['code' => 'A12.76404', 'name' => 'Pemrograman Web Lanjut',           'sks' => 2, 'prodi_id' => $prodiA12],
            ['code' => 'A12.76603', 'name' => 'Manajemen Basis Data',             'sks' => 2, 'prodi_id' => $prodiA12],

            // A14 - DKV S1
            ['code' => 'A14.37203', 'name' => 'Grafis Komputer',                  'sks' => 2, 'prodi_id' => $prodiA14],
            ['code' => 'A14.37407', 'name' => 'Reprografika',                     'sks' => 2, 'prodi_id' => $prodiA14],
            ['code' => 'A14.37406', 'name' => 'Pemodelan 3D',                     'sks' => 4, 'prodi_id' => $prodiA14],
            ['code' => 'A14.37602', 'name' => 'Grafis Bergerak',                  'sks' => 2, 'prodi_id' => $prodiA14],
            ['code' => 'A14.37603', 'name' => 'Proyek Konten Kreatif',            'sks' => 2, 'prodi_id' => $prodiA14],
            ['code' => 'A14.37605', 'name' => 'Proyek Desain Kemasan',            'sks' => 2, 'prodi_id' => $prodiA14],
            ['code' => 'A14.37606', 'name' => 'Proyek Animasi',                   'sks' => 2, 'prodi_id' => $prodiA14],
            ['code' => 'A14.37402', 'name' => 'Desain Web',                       'sks' => 2, 'prodi_id' => $prodiA14],

            // A15 - Ilmu Komunikasi S1
            ['code' => 'A15.21404', 'name' => 'Digital Storytelling',             'sks' => 2, 'prodi_id' => $prodiA15],

            // A16 - FTV S1
            ['code' => 'A16.22003', 'name' => 'Video Editing',                    'sks' => 2, 'prodi_id' => $prodiA16],
            ['code' => 'A16.4105',  'name' => 'Tata Suara Pemutaran Film',        'sks' => 2, 'prodi_id' => $prodiA16],

            // A17 - Animasi S1
            ['code' => 'A17.1B115', 'name' => 'Ilustrasi',                        'sks' => 2, 'prodi_id' => $prodiA17],
            ['code' => 'A17.1B117', 'name' => 'Pemodelan 3D I',                   'sks' => 2, 'prodi_id' => $prodiA17],
            ['code' => 'A17.1B218', 'name' => 'Animasi 2D I',                     'sks' => 2, 'prodi_id' => $prodiA17],
            ['code' => 'A17.1B316', 'name' => 'Animasi 3D I',                     'sks' => 2, 'prodi_id' => $prodiA17],
            ['code' => 'A17.1B319', 'name' => 'Grafika Gerak',                    'sks' => 2, 'prodi_id' => $prodiA17],
            ['code' => 'A17.1B408', 'name' => 'Animasi 3D II',                    'sks' => 2, 'prodi_id' => $prodiA17],
            ['code' => 'A17.1B416', 'name' => 'Rigging 2D',                       'sks' => 2, 'prodi_id' => $prodiA17],
            ['code' => 'A17.1B418', 'name' => 'Efek Visual 2D',                   'sks' => 2, 'prodi_id' => $prodiA17],
            ['code' => 'A17.1B419', 'name' => 'Efek Visual 3D',                   'sks' => 2, 'prodi_id' => $prodiA17],
            ['code' => 'A17.1B613', 'name' => 'Kecerdasan Artifisial Kreatif',    'sks' => 2, 'prodi_id' => $prodiA17],

            // A22 - Teknik Informatika D3
            ['code' => 'A22.63206', 'name' => 'Multimedia',                       'sks' => 2, 'prodi_id' => $prodiA22],
            ['code' => 'A22.63207', 'name' => 'Basis Data',                       'sks' => 2, 'prodi_id' => $prodiA22],
            ['code' => 'A22.63233', 'name' => 'Proyek Aplikasi Web I',            'sks' => 2, 'prodi_id' => $prodiA22],
            ['code' => 'A22.63417', 'name' => 'Proyek Aplikasi Mobile II',        'sks' => 2, 'prodi_id' => $prodiA22],
        ];

        foreach ($courses as $course) {
            if ($course['prodi_id']) {
                Course::updateOrCreate(
                    ['code' => $course['code']],
                    $course
                );
            }
        }

        $this->command->info('Course seeder completed: ' . count($courses) . ' mata kuliah.');
    }
}
