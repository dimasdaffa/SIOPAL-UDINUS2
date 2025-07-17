<?php

use App\Models\lapor_ptpp;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Skip tests if the required tables don't exist in the test database
    if (!Schema::hasTable('lapor_ptpps')) {
        $this->markTestSkipped('lapor_ptpps table does not exist in the test database.');
    }
});

test('laporan ptpp dapat dibuat dengan data lengkap', function () {
    $tanggalSekarang = Carbon::now()->format('Y-m-d');

    $ptpp = lapor_ptpp::create([
        'nomor_sop' => 'SOP/LAB/2025/001',
        'ketidaksesuaian' => 'PC tidak dapat dinyalakan',
        'lokasi' => 'Lab D2.1',
        'tgl_kejadian' => $tanggalSekarang,
        'jam_kejadian' => '09:30',
        'tgl_laporan' => $tanggalSekarang,
        'jam_laporan' => '10:00',
        'hasil_pengamatan' => 'Power supply rusak',
        'tindakan_langsung' => 'Cek kabel power dan power supply',
        'permintaan_perbaikan' => 'Ganti power supply',
        'nama_pelapor' => 'Budi Santoso',
        'bagian_pelapor' => 'IT Support',
        'jabatan_pelapor' => 'Staff'
    ]);

    // Verifikasi bahwa laporan tersimpan di database
    $this->assertDatabaseHas('lapor_ptpps', [
        'nomor_sop' => 'SOP/LAB/2025/001',
        'ketidaksesuaian' => 'PC tidak dapat dinyalakan',
        'nama_pelapor' => 'Budi Santoso'
    ]);

    // Verifikasi data tersimpan dengan benar
    expect($ptpp->ketidaksesuaian)->toBe('PC tidak dapat dinyalakan');
    expect($ptpp->tgl_kejadian->format('Y-m-d'))->toBe($tanggalSekarang);
    expect($ptpp->jam_kejadian)->toBe('09:30');
});

test('tanggal laporan ptpp diformat menjadi objek Carbon', function () {
    $ptpp = lapor_ptpp::create([
        'nomor_sop' => 'SOP/LAB/2025/002',
        'ketidaksesuaian' => 'Printer tidak dapat mencetak',
        'lokasi' => 'Lab D3.2',
        'tgl_kejadian' => '2025-07-10',
        'jam_kejadian' => '13:45',
        'tgl_laporan' => '2025-07-10',
        'jam_laporan' => '14:00',
        'hasil_pengamatan' => 'Tinta habis',
        'tindakan_langsung' => 'Cek level tinta',
        'permintaan_perbaikan' => 'Pengisian tinta printer',
        'nama_pelapor' => 'Siti Aminah',
        'bagian_pelapor' => 'Admin Lab',
        'jabatan_pelapor' => 'Staff'
    ]);

    // Verifikasi bahwa tanggal disimpan sebagai objek Carbon
    expect($ptpp->tgl_kejadian)->toBeInstanceOf(Carbon::class);
    expect($ptpp->tgl_laporan)->toBeInstanceOf(Carbon::class);

    // Verifikasi format tanggal
    expect($ptpp->tgl_kejadian->format('Y-m-d'))->toBe('2025-07-10');
    expect($ptpp->tgl_laporan->format('Y-m-d'))->toBe('2025-07-10');
});

test('laporan ptpp membutuhkan nomor sop', function () {
    // Testing validation (incomplete data)
    expect(function () {
        lapor_ptpp::create([
            'ketidaksesuaian' => 'PC tidak dapat dinyalakan',
            'lokasi' => 'Lab D2.1',
            'tgl_kejadian' => '2025-07-10',
            'jam_kejadian' => '09:30',
            // nomor_sop is missing
        ]);
    })->toThrow(Exception::class);
});

test('data ptpp dapat diperbarui', function () {
    // Create initial report
    $ptpp = lapor_ptpp::create([
        'nomor_sop' => 'SOP/LAB/2025/003',
        'ketidaksesuaian' => 'Monitor tidak menyala',
        'lokasi' => 'Lab D4.3',
        'tgl_kejadian' => '2025-07-12',
        'jam_kejadian' => '10:15',
        'tgl_laporan' => '2025-07-12',
        'jam_laporan' => '10:30',
        'hasil_pengamatan' => 'Kabel VGA lepas',
        'tindakan_langsung' => 'Cek koneksi kabel',
        'permintaan_perbaikan' => 'Perbaikan koneksi kabel monitor',
        'nama_pelapor' => 'Ahmad Farhan',
        'bagian_pelapor' => 'Laboran',
        'jabatan_pelapor' => 'Asisten'
    ]);

    // Update the report
    $ptpp->hasil_pengamatan = 'Kabel VGA dan power lepas';
    $ptpp->tindakan_langsung = 'Cek koneksi kabel dan power';
    $ptpp->save();

    // Reload from database
    $updatedPtpp = lapor_ptpp::find($ptpp->id);

    // Verify updates
    expect($updatedPtpp->hasil_pengamatan)->toBe('Kabel VGA dan power lepas');
    expect($updatedPtpp->tindakan_langsung)->toBe('Cek koneksi kabel dan power');

    // Original data should remain unchanged
    expect($updatedPtpp->ketidaksesuaian)->toBe('Monitor tidak menyala');
    expect($updatedPtpp->nama_pelapor)->toBe('Ahmad Farhan');
});

test('laporan ptpp dapat dikelompokkan berdasarkan lokasi', function () {
    // Create reports for different locations
    lapor_ptpp::create([
        'nomor_sop' => 'SOP/LAB/2025/004',
        'ketidaksesuaian' => 'PC tidak dapat dinyalakan',
        'lokasi' => 'Lab D2.1',
        'tgl_kejadian' => '2025-07-13',
        'jam_kejadian' => '09:30',
        'tgl_laporan' => '2025-07-13',
        'jam_laporan' => '10:00',
        'hasil_pengamatan' => 'Power supply rusak',
        'tindakan_langsung' => 'Cek kabel power',
        'permintaan_perbaikan' => 'Ganti power supply',
        'nama_pelapor' => 'Adi Nugroho',
        'bagian_pelapor' => 'IT Support',
        'jabatan_pelapor' => 'Staff'
    ]);

    lapor_ptpp::create([
        'nomor_sop' => 'SOP/LAB/2025/005',
        'ketidaksesuaian' => 'AC terlalu panas',
        'lokasi' => 'Lab D2.1',
        'tgl_kejadian' => '2025-07-14',
        'jam_kejadian' => '13:00',
        'tgl_laporan' => '2025-07-14',
        'jam_laporan' => '13:30',
        'hasil_pengamatan' => 'Freon kurang',
        'tindakan_langsung' => 'Setel suhu lebih rendah',
        'permintaan_perbaikan' => 'Isi ulang freon',
        'nama_pelapor' => 'Dewi Sartika',
        'bagian_pelapor' => 'Admin Lab',
        'jabatan_pelapor' => 'Staff'
    ]);

    lapor_ptpp::create([
        'nomor_sop' => 'SOP/LAB/2025/006',
        'ketidaksesuaian' => 'Proyektor tidak menyala',
        'lokasi' => 'Lab D3.2',
        'tgl_kejadian' => '2025-07-15',
        'jam_kejadian' => '14:00',
        'tgl_laporan' => '2025-07-15',
        'jam_laporan' => '14:15',
        'hasil_pengamatan' => 'Lampu proyektor mati',
        'tindakan_langsung' => 'Coba reset proyektor',
        'permintaan_perbaikan' => 'Ganti lampu proyektor',
        'nama_pelapor' => 'Rudi Hartono',
        'bagian_pelapor' => 'Dosen',
        'jabatan_pelapor' => 'Pengajar'
    ]);

    // Group by location and count
    $groupedReports = lapor_ptpp::select('lokasi', \DB::raw('count(*) as total'))
        ->groupBy('lokasi')
        ->get()
        ->keyBy('lokasi')
        ->map(function ($item) {
            return $item->total;
        })
        ->toArray();

    // Verify grouping results
    expect($groupedReports)->toHaveCount(2);
    expect($groupedReports['Lab D2.1'])->toBe(2);
    expect($groupedReports['Lab D3.2'])->toBe(1);
});
