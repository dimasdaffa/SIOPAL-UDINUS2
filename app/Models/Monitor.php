<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    protected $fillable = [
        'merk',
        'nama',
        'resolusi',
        'ukuran',
        'spesifikasi',
        'tahun',
        'bulan',
        'stok',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($monitors) {
            $lastId = self::max('id') + 1; // Ambil ID terakhir & tambahkan 1
            $kodeUnik = str_pad($lastId, 3, '0', STR_PAD_LEFT); // Format 001, 002, dst.
            $monitors->no_inventaris = 'LABKOM/MON/' . $kodeUnik . '/' . $monitors->tahun;
        });
    }
}
