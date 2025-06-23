<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DVD extends Model
{
    protected $fillable = [
        'merk',
        'dvd',
        'spesifikasi',
        'tahun',
        'bulan',
        'stok',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($dvd) {
            $lastId = self::max('id') + 1; // Ambil ID terakhir & tambahkan 1
            $kodeUnik = str_pad($lastId, 3, '0', STR_PAD_LEFT); // Format 001, 002, dst.
            $dvd->no_inventaris = 'LABKOM/DVD' . $kodeUnik . '/' . $dvd->tahun;
        });
    }
}
