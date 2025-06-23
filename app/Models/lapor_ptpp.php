<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lapor_ptpp extends Model
{
    protected $table = 'lapor_ptpps';

    protected $fillable = [
        // 'ptpp',
        'nomor_sop',
        'ketidaksesuaian',
        'lokasi',
        'tgl_kejadian',
        'jam_kejadian',
        'tgl_laporan',
        'jam_laporan',
        'hasil_pengamatan',
        'tindakan_langsung',
        'permintaan_perbaikan',
        'nama_pelapor',
        'bagian_pelapor',
        'jabatan_pelapor',
    ];

    public $timestamps = true;

    protected $casts = [
        'tgl_kejadian' => 'date',
        'tgl_laporan' => 'date',
    ];
}
