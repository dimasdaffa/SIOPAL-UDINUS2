<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyimpanan extends Model
{
    protected $fillable = [
        'no_inventaris',
        'merk',
        'tipe',
        'kapasitas',
        'spesifikasi',
        'bulan',
        'stok',
        'tahun'
    ];

    // Auto-generate Nomor Inventaris sebelum menyimpan
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($penyimpanan) {
            $lastId = self::max('id') + 1; // Ambil ID terakhir & tambahkan 1
            $kodeUnik = str_pad($lastId, 3, '0', STR_PAD_LEFT); // Format 001, 002, dst.
            $penyimpanan->no_inventaris = 'LABKOM/PM/' . $kodeUnik . '/' . $penyimpanan->tahun;
        });
    }
}
