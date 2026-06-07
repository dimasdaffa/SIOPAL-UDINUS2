<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Laboratorium;
use App\Models\SoftwareDetail;
use Illuminate\Database\Seeder;

class SoftwareInventorySeeder extends Seeder
{
    /**
     * Buat record inventaris software di tabel `inventories`
     * berdasarkan relasi yang sudah ada di tabel pivot `lab_software`.
     *
     * Halaman "Inventaris Software" query dari tabel `inventories`
     * (dengan inventoriable_type = SoftwareDetail), BUKAN dari `lab_software`.
     */
    public function run(): void
    {
        // Ambil semua lab yang punya relasi software
        $labs = Laboratorium::with('software')->get();

        $totalCreated = 0;

        foreach ($labs as $lab) {
            $nomorUrut = 1;

            foreach ($lab->software as $software) {
                // Cek apakah sudah ada inventory record untuk kombinasi ini
                $exists = Inventory::where('laboratorium_id', $lab->id)
                    ->where('inventoriable_type', SoftwareDetail::class)
                    ->where('inventoriable_id', $software->id)
                    ->exists();

                if ($exists) {
                    $nomorUrut++;
                    continue;
                }

                // Buat kode inventaris: UDN/LABKOM/INV/SOFTWARE/{RUANG}/{NOMOR}
                $namaLab = strtoupper($lab->ruang);
                $kode = "UDN/LABKOM/INV/SOFTWARE/{$namaLab}/" . str_pad($nomorUrut, 2, '0', STR_PAD_LEFT);

                // Pastikan kode unik
                while (Inventory::where('kode_inventaris', $kode)->exists()) {
                    $nomorUrut++;
                    $kode = "UDN/LABKOM/INV/SOFTWARE/{$namaLab}/" . str_pad($nomorUrut, 2, '0', STR_PAD_LEFT);
                }

                // Insert langsung tanpa trigger creating event (sudah kita generate sendiri kodenya)
                Inventory::withoutEvents(function () use ($lab, $software, $kode) {
                    Inventory::create([
                        'laboratorium_id' => $lab->id,
                        'kode_inventaris' => $kode,
                        'nama_barang' => $software->nama,
                        'kondisi' => 'Baik',
                        'tanggal_pengadaan' => null,
                        'inventoriable_id' => $software->id,
                        'inventoriable_type' => SoftwareDetail::class,
                    ]);
                });

                $nomorUrut++;
                $totalCreated++;
            }

            if ($lab->software->count() > 0) {
                $this->command->info("Lab {$lab->ruang}: {$lab->software->count()} software inventory dibuat.");
            }
        }

        $this->command->info("SoftwareInventory seeder selesai: {$totalCreated} record inventaris software dibuat.");
    }
}
