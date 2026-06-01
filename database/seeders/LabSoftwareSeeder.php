<?php

namespace Database\Seeders;

use App\Models\Laboratorium;
use App\Models\SoftwareDetail;
use Illuminate\Database\Seeder;

class LabSoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Mapping lab => software PERSIS sesuai siopalfull.sql (tabel lab_software).
     * Lab IDs di SQL asli: D2A=3, D2B=4, D2C=5, D2D=6, D2E=7, D2G=9,
     *                       D2H=10, D2I=11, D2J=12, D2K=13, D3L=14, D3M=15, D3N=16
     *
     * Software yang digunakan (berdasarkan SQL):
     *  - VSCODE(9), CHROME(47), FIREFOX(48), GIT(49)       => semua lab
     *  - FIGMA(24)                                           => PM labs (D2A,D2B,D2C,D2E,D2G,D2H,D2I,D2J,D3L,D3M)
     *  - BLENDER(26), MAYA(27), 3DSMAX(28), ANIMATE(32),
     *    AFTEREFFECT(35)                                     => PM & MM labs
     *  - D2D (MM) & D2E (DB): + ZBRUSH(29), CINEMA4D(30),
     *    TOONBOOM(31), CLIPSTUDIO(33), SPINE(38), DRAGONBONES(39)
     *  - D2I (PM): + PYTHON(40), JUPYTER(41), COMFYUI(42),
     *    STABLEDIFF(43), INTELLIJ(16), ANDROID_STUDIO(17)
     *  - D3L, D3M, D3N (MM/DB labs): + INTELLIJ(11), ANDROID_STUDIO(10),
     *    MYSQL(16...) => sesuai SQL
     */
    public function run(): void
    {
        // Mapping: ruang => [software_code, ...]
        // Diambil dari SQL: lab_software pivot (lab_id => software_detail_id)
        // D2A(id=3): 9,47,48,49,24,26,27,28,32,35,36
        // D2B(id=4): 9,47,48,49,24,26,27,28,32,35,36
        // D2C(id=5): 9,47,48,49,24,26,27,28,32,35,36
        // D2D(id=6): 9,47,48,49,26,27,28,29,30,31,32,33,38,39,35
        // D2E(id=7): 9,47,48,49,26,27,28,29,30,31,32,33,38,39,35
        // D2G(id=9): 9,47,48,49,24,26,27,28,32,35,36
        // D2H(id=10):9,47,48,49,24,26,27,28,32,35,36
        // D2I(id=11):9,47,48,49,24,26,27,28,32,35,36,40,41,42,43,16,17
        // D2J(id=12):9,47,48,49,24,26,27,28,32,35,36
        // D3L(id=14):9,47,48,49,11,10,12,13,14,16,17,18,15,19,20
        // D3M(id=15):9,47,48,49,11,10,12,13,14,16,17,18,15,19,20
        // D3N(id=16):9,47,48,49,11,10,12,13,14,16,17,18,15,19,20

        // Kelompok software (berdasarkan ID dari SQL asli)
        $base      = [9, 47, 48, 49];           // VSCode, Chrome, Firefox, Git
        $mmBasic   = [24, 26, 27, 28, 32, 35, 36]; // Figma,Blender,Maya,3dsMax,Animate,AfterEffects,DaVinci
        $mmFull    = [26, 27, 28, 29, 30, 31, 32, 33, 38, 39, 35]; // +ZBrush,Cinema4D,ToonBoom,ClipStudio,Spine,DragonBones
        $aiExtra   = [40, 41, 42, 43, 16, 17];  // Python,Jupyter,ComfyUI,StableDiff,MySQL,DBeaver
        $progFull  = [11, 10, 12, 13, 14, 16, 17, 18, 15, 19, 20]; // IntelliJ,AndroidStudio,XAMPP,NodeJS,Laragon,MySQL,DBeaver,phpMyAdmin,Postman,Unity,Godot

        $labSoftwareCodes = [
            'D2A' => array_merge($base, $mmBasic),
            'D2B' => array_merge($base, $mmBasic),
            'D2C' => array_merge($base, $mmBasic),
            'D2D' => array_merge($base, $mmFull),
            'D2E' => array_merge($base, $mmFull),
            'D2G' => array_merge($base, $mmBasic),
            'D2H' => array_merge($base, $mmBasic),
            'D2I' => array_merge($base, $mmBasic, $aiExtra),
            'D2J' => array_merge($base, $mmBasic),
            'D2K' => array_merge($base, $mmBasic),
            'D3L' => array_merge($base, $progFull),
            'D3M' => array_merge($base, $progFull),
            'D3N' => array_merge($base, $progFull),
        ];

        $totalSynced = 0;

        foreach ($labSoftwareCodes as $ruang => $softwareIds) {
            $lab = Laboratorium::where('ruang', $ruang)->first();

            if (! $lab) {
                $this->command->warn("Lab tidak ditemukan: {$ruang}");
                continue;
            }

            // Buat array unique, filter software yang ada di DB
            $softwareIds  = array_unique($softwareIds);
            $existingSoftware = SoftwareDetail::whereIn('id', $softwareIds)->pluck('id');

            // Sync pivot lab_software
            $syncData = [];
            foreach ($existingSoftware as $swId) {
                $syncData[$swId] = ['version' => '1.0'];
            }

            if (! empty($syncData)) {
                $lab->software()->sync($syncData);
                $count = count($syncData);
                $totalSynced += $count;
                $this->command->info("Lab {$ruang}: {$count} software di-sync.");
            }
        }

        $this->command->info("LabSoftware seeder selesai: {$totalSynced} relasi lab-software dibuat.");
    }
}
