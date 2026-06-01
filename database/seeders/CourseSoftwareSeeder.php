<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\SoftwareDetail;
use Illuminate\Database\Seeder;

class CourseSoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Relasi course_software PERSIS sesuai siopalfull.sql.
     *
     * Mapping dari SQL (course_id => [software_detail_id, ...]):
     *   4  (Pemrograman Web Lanjut - A11)       => [9]                  VSCode
     *   9  (Pemrograman Web Lanjut - A12)       => [47,49,13,15,9,12]  Chrome,Git,NodeJS,Postman,VSCode,XAMPP
     *  10  (Manajemen Basis Data - A12)         => [17,45,16,18]       DBeaver,Excel,MySQL,phpMyAdmin
     *  11  (Grafis Komputer - A14)              => -  (tidak ada di SQL, 0 software)
     *  12  (Reprografika - A14)                 => -  (tidak ada di SQL)
     *  13  (Pemodelan 3D - A14)                 => [28,26,27]          3dsMax,Blender,Maya
     *  14  (Grafis Bergerak - A14)              => [35,32,26]          AfterEffects,Animate,Blender
     *  15  (Proyek Konten Kreatif - A14)        => [35]                AfterEffects
     *  16  (Proyek Desain Kemasan - A14)        => -  (tidak ada)
     *  17  (Proyek Animasi - A14)               => [35,32,26,27]       AfterEffects,Animate,Blender,Maya
     *  18  (Digital Storytelling - A15)         => [35,36]             AfterEffects,DaVinci
     *  19  (Video Editing - A16)                => [35,36]             AfterEffects,DaVinci
     *  20  (Tata Suara Pemutaran Film - A16)    => [36]                DaVinci
     *  21  (Ilustrasi - A17)                    => [33]                ClipStudio
     *  22  (Pemodelan 3D I - A17)               => [28,26,27]          3dsMax,Blender,Maya
     *  23  (Animasi 2D I - A17)                 => [32,33,31]          Animate,ClipStudio,ToonBoom
     *  24  (Animasi 3D I - A17)                 => [28,26,27]          3dsMax,Blender,Maya
     *  25  (Grafika Gerak - A17)                => [35,26,30]          AfterEffects,Blender,Cinema4D
     *  26  (Animasi 3D II - A17)                => [28,26,27,29]       3dsMax,Blender,Maya,ZBrush
     *  27  (Rigging 2D - A17)                   => [39,38,31]          DragonBones,Spine,ToonBoom
     *  28  (Efek Visual 2D - A17)               => [35,32,31]          AfterEffects,Animate,ToonBoom
     *  29  (Efek Visual 3D - A17)               => [35,26,27]          AfterEffects,Blender,Maya
     *  30  (Kecerdasan Artifisial Kreatif - A17)=> [42,41,40,43]       ComfyUI,Jupyter,Python,StableDiff
     *  31  (Multimedia - A22)                   => [32,44]             Animate,Flash
     *  32  (Basis Data - A22)                   => [32,44]  =>         [32,44] -- dari SQL(82,83): Animate, Flash
     *      KOREKSI dari SQL line 225-226: course 31=[32,44], course 32=[32,44]
     *      Lihat lagi: (82,31,32,...),(83,31,44,...) => course31: sw32,sw44
     *                  (85,33,49,...) => course33: sw49
     *  32  (Basis Data - A22)                   => [16,17,18] -- disesuaikan logis: MySQL,DBeaver,phpMyAdmin
     *      KOREKSI SQL baris 225-226: (82,31,32,NULL,NULL),(83,31,44,NULL,NULL) => course_id=31, sw=32,44
     *      Tidak ada data untuk course_id=32 di SQL -> 0
     *  33  (Proyek Aplikasi Web I - A22)        => [49,13,15,9,12]    Git,NodeJS,Postman,VSCode,XAMPP
     *  34  (Proyek Aplikasi Mobile II - A22)    => [10,24,49,9]       AndroidStudio,Figma,Git,VSCode
     *  35  (Algoritma Dan Struktur Data - A11)  => [9]                VSCode
     *  36  (Pemrograman Berorientasi Objek - A11)=> [9]               VSCode
     *  37  (Sistem Basis Data - A11)            => [9]                VSCode
     *  38  (Pemrograman Sisi Klien - A11)       => [9]                VSCode
     *  39  (Pemrograman Sisi Server - A11)      => [9]                VSCode
     *  40  (Pemrograman Game - A11)             => [9]                VSCode
     *  44  (Desain Web - A14)                   => [4]                Premiere (sesuai SQL baris 243: course_id=44,sw_id=4)
     */
    public function run(): void
    {
        // Mapping berdasarkan kode mata kuliah => [software_detail_id, ...]
        // Diambil PERSIS dari siopalfull.sql tabel course_software
        $courseSoftwareByCode = [
            // A11 - Teknik Informatika
            'A11.64404'  => [9],           // Pemrograman Web Lanjut => VSCode
            'A11.64204'  => [9],           // Algoritma Dan Struktur Data => VSCode
            'A11.64403'  => [9],           // Pemrograman Berorientasi Objek => VSCode
            'A11.64406'  => [9],           // Sistem Basis Data => VSCode
            'A11.64706'  => [9],           // Pemrograman Sisi Klien => VSCode
            'A11.64707'  => [9],           // Pemrograman Sisi Server => VSCode
            'A11.64710'  => [9],           // Pemrograman Game => VSCode

            // A12 - Sistem Informasi
            'A12.76404'  => [47, 49, 13, 15, 9, 12],  // Pemrograman Web Lanjut => Chrome,Git,NodeJS,Postman,VSCode,XAMPP
            'A12.76603'  => [17, 45, 16, 18],          // Manajemen Basis Data => DBeaver,Excel,MySQL,phpMyAdmin

            // A14 - DKV
            // Grafis Komputer (id=11) => tidak ada di SQL
            // Reprografika (id=12) => tidak ada di SQL
            'A14.37406'  => [28, 26, 27],              // Pemodelan 3D => 3dsMax,Blender,Maya
            'A14.37602'  => [35, 32, 26],              // Grafis Bergerak => AfterEffects,Animate,Blender
            'A14.37603'  => [35],                      // Proyek Konten Kreatif => AfterEffects
            // Proyek Desain Kemasan (id=16) => tidak ada di SQL
            'A14.37606'  => [35, 32, 26, 27],          // Proyek Animasi => AfterEffects,Animate,Blender,Maya
            'A14.37402'  => [4],                       // Desain Web => Premiere Pro

            // A15 - Ilmu Komunikasi
            'A15.21404'  => [35, 36],                  // Digital Storytelling => AfterEffects,DaVinci

            // A16 - FTV
            'A16.22003'  => [35, 36],                  // Video Editing => AfterEffects,DaVinci
            'A16.4105'   => [36],                      // Tata Suara Pemutaran Film => DaVinci

            // A17 - Animasi
            'A17.1B115'  => [33],                      // Ilustrasi => ClipStudio
            'A17.1B117'  => [28, 26, 27],              // Pemodelan 3D I => 3dsMax,Blender,Maya
            'A17.1B218'  => [32, 33, 31],              // Animasi 2D I => Animate,ClipStudio,ToonBoom
            'A17.1B316'  => [28, 26, 27],              // Animasi 3D I => 3dsMax,Blender,Maya
            'A17.1B319'  => [35, 26, 30],              // Grafika Gerak => AfterEffects,Blender,Cinema4D
            'A17.1B408'  => [28, 26, 27, 29],          // Animasi 3D II => 3dsMax,Blender,Maya,ZBrush
            'A17.1B416'  => [39, 38, 31],              // Rigging 2D => DragonBones,Spine,ToonBoom
            'A17.1B418'  => [35, 32, 31],              // Efek Visual 2D => AfterEffects,Animate,ToonBoom
            'A17.1B419'  => [35, 26, 27],              // Efek Visual 3D => AfterEffects,Blender,Maya
            'A17.1B613'  => [42, 41, 40, 43],          // Kecerdasan Artifisial Kreatif => ComfyUI,Jupyter,Python,StableDiff

            // A22 - Teknik Informatika D3
            'A22.63206'  => [32, 44],                  // Multimedia => Animate,Flash
            // Basis Data (A22.63207) => tidak ada di SQL (0 relasi)
            'A22.63233'  => [49, 13, 15, 9, 12],       // Proyek Aplikasi Web I => Git,NodeJS,Postman,VSCode,XAMPP
            'A22.63417'  => [10, 24, 49, 9],           // Proyek Aplikasi Mobile II => AndroidStudio,Figma,Git,VSCode
        ];

        $attached = 0;
        $skipped  = 0;

        foreach ($courseSoftwareByCode as $courseCode => $softwareIds) {
            // Cari course berdasarkan code (trim whitespace karena SQL punya leading space)
            $course = Course::whereRaw('TRIM(code) = ?', [trim($courseCode)])->first();

            if (! $course) {
                $this->command->warn("Course tidak ditemukan: {$courseCode}");
                $skipped++;
                continue;
            }

            // Filter hanya software yang ada di DB
            $existingIds = SoftwareDetail::whereIn('id', $softwareIds)->pluck('id')->toArray();

            if (empty($existingIds)) {
                $this->command->warn("Software tidak ditemukan untuk course: {$courseCode}");
                $skipped++;
                continue;
            }

            $course->software()->sync($existingIds);
            $attached++;
            $this->command->info("Attach " . count($existingIds) . " software ke: [{$courseCode}] {$course->name}");
        }

        $this->command->info("CourseSoftware seeder selesai: {$attached} mata kuliah terhubung, {$skipped} dilewati.");
    }
}
