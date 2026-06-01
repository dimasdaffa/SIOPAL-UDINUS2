<?php

namespace Database\Seeders;

use App\Models\SoftwareDetail;
use Illuminate\Database\Seeder;

class SoftwareDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Data software sesuai persis dengan siopalfull.sql.
     * ID dipertahankan agar konsisten dengan relasi lab_software & course_software.
     */
    public function run(): void
    {
        // Format: [id, code, nama, keterangan]
        // ID dipertahankan sesuai SQL asli agar relasi tidak rusak.
        $software = [
            ['id' => 4,  'code' => 'PREMIERE',    'nama' => 'Adobe Premiere Pro',       'keterangan' => null],
            ['id' => 5,  'code' => 'VIM',          'nama' => 'NeoVim',                   'keterangan' => null],
            ['id' => 8,  'code' => 'WORD',         'nama' => 'Microsoft Word',           'keterangan' => null],
            ['id' => 9,  'code' => 'VSCODE',       'nama' => 'Visual Studio Code',       'keterangan' => 'Code editor untuk Pemrograman Web, Struktur Data, dll'],
            ['id' => 10, 'code' => 'ANDROID_STUDIO','nama' => 'Android Studio',          'keterangan' => 'IDE untuk Proyek Aplikasi Mobile'],
            ['id' => 11, 'code' => 'INTELLIJ',     'nama' => 'IntelliJ IDEA',            'keterangan' => 'IDE untuk Pemrograman Berorientasi Objek (Java)'],
            ['id' => 12, 'code' => 'XAMPP',        'nama' => 'XAMPP',                    'keterangan' => 'Apache + MySQL + PHP untuk Pemrograman Web Lanjut'],
            ['id' => 13, 'code' => 'NODEJS',       'nama' => 'Node.js',                  'keterangan' => 'JavaScript runtime untuk Pemrograman Sisi Server'],
            ['id' => 14, 'code' => 'LARAGON',      'nama' => 'Laragon',                  'keterangan' => 'Laravel development environment'],
            ['id' => 15, 'code' => 'POSTMAN',      'nama' => 'Postman',                  'keterangan' => 'API testing untuk Pemrograman Web'],
            ['id' => 16, 'code' => 'MYSQL',        'nama' => 'MySQL Workbench',          'keterangan' => 'Database management untuk Sistem Basis Data'],
            ['id' => 17, 'code' => 'DBEAVER',      'nama' => 'DBeaver',                  'keterangan' => 'Universal database tool untuk Manajemen Basis Data'],
            ['id' => 18, 'code' => 'PHPMYADMIN',   'nama' => 'phpMyAdmin',               'keterangan' => 'Web-based MySQL administration'],
            ['id' => 19, 'code' => 'UNITY',        'nama' => 'Unity',                    'keterangan' => 'Game engine untuk Pemrograman Game'],
            ['id' => 20, 'code' => 'GODOT',        'nama' => 'Godot Engine',             'keterangan' => 'Open source game engine'],
            ['id' => 21, 'code' => 'UNREAL',       'nama' => 'Unreal Engine',            'keterangan' => 'Game engine untuk Pemrograman Game'],
            ['id' => 24, 'code' => 'FIGMA',        'nama' => 'Figma',                    'keterangan' => 'UI/UX design untuk Desain Web'],
            ['id' => 26, 'code' => 'BLENDER',      'nama' => 'Blender',                  'keterangan' => '3D modeling/animation untuk Pemodelan 3D, Animasi 3D'],
            ['id' => 27, 'code' => 'MAYA',         'nama' => 'Autodesk Maya',            'keterangan' => '3D animation untuk Animasi 3D I, Animasi 3D II'],
            ['id' => 28, 'code' => '3DSMAX',       'nama' => '3ds Max',                  'keterangan' => '3D modeling untuk Pemodelan 3D I'],
            ['id' => 29, 'code' => 'ZBRUSH',       'nama' => 'ZBrush',                   'keterangan' => 'Digital sculpting untuk Pemodelan 3D'],
            ['id' => 30, 'code' => 'CINEMA4D',     'nama' => 'Cinema 4D',                'keterangan' => 'Motion graphics untuk Grafika Gerak'],
            ['id' => 31, 'code' => 'TOONBOOM',     'nama' => 'Toon Boom Harmony',        'keterangan' => '2D animation untuk Animasi 2D I'],
            ['id' => 32, 'code' => 'ANIMATE',      'nama' => 'Adobe Animate',            'keterangan' => '2D animation untuk Animasi 2D, Grafis Bergerak'],
            ['id' => 33, 'code' => 'CLIPSTUDIO',   'nama' => 'Clip Studio Paint',        'keterangan' => 'Digital illustration untuk Ilustrasi'],
            ['id' => 34, 'code' => 'PROCREATE',    'nama' => 'Procreate',                'keterangan' => 'Digital illustration untuk Ilustrasi'],
            ['id' => 35, 'code' => 'AFTEREFFECT',  'nama' => 'Adobe After Effects',      'keterangan' => 'Motion graphics untuk Efek Visual 2D, Efek Visual 3D'],
            ['id' => 36, 'code' => 'DAVINCI',      'nama' => 'DaVinci Resolve',          'keterangan' => 'Video editing & color grading'],
            ['id' => 38, 'code' => 'SPINE',        'nama' => 'Spine',                    'keterangan' => '2D skeletal animation untuk Rigging 2D'],
            ['id' => 39, 'code' => 'DRAGONBONES',  'nama' => 'DragonBones',              'keterangan' => '2D rigging tool untuk Rigging 2D'],
            ['id' => 40, 'code' => 'PYTHON',       'nama' => 'Python',                   'keterangan' => 'Programming language untuk Kecerdasan Artifisial Kreatif'],
            ['id' => 41, 'code' => 'JUPYTER',      'nama' => 'Jupyter Notebook',         'keterangan' => 'Interactive computing untuk AI/ML'],
            ['id' => 42, 'code' => 'COMFYUI',      'nama' => 'ComfyUI',                  'keterangan' => 'AI image generation untuk Kecerdasan Artifisial Kreatif'],
            ['id' => 43, 'code' => 'STABLEDIFF',   'nama' => 'Stable Diffusion',         'keterangan' => 'AI image generation'],
            ['id' => 44, 'code' => 'FLASH',        'nama' => 'Adobe Flash/Animate',      'keterangan' => 'Multimedia authoring untuk Multimedia'],
            ['id' => 45, 'code' => 'EXCEL',        'nama' => 'Microsoft Excel',          'keterangan' => 'Spreadsheet'],
            ['id' => 46, 'code' => 'POWERPOINT',   'nama' => 'Microsoft PowerPoint',     'keterangan' => 'Presentation'],
            ['id' => 47, 'code' => 'CHROME',       'nama' => 'Google Chrome',            'keterangan' => 'Web browser untuk testing web'],
            ['id' => 48, 'code' => 'FIREFOX',      'nama' => 'Mozilla Firefox',          'keterangan' => 'Web browser untuk development'],
            ['id' => 49, 'code' => 'GIT',          'nama' => 'Git',                      'keterangan' => 'Version control untuk semua mata kuliah pemrograman'],
        ];

        foreach ($software as $item) {
            SoftwareDetail::updateOrCreate(
                ['id' => $item['id']],
                [
                    'code'       => $item['code'],
                    'nama'       => $item['nama'],
                    'keterangan' => $item['keterangan'],
                ]
            );
        }

        $this->command->info('SoftwareDetail seeder completed: ' . count($software) . ' software.');
    }
}
