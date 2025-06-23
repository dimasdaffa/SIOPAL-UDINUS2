<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model
{
    protected $fillable = [
        'merk',
        'tipe',
        'tahun',
        'bulan',
        'stok',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($motherboard) {
            $lastId = self::max('id') + 1; // Ambil ID terakhir & tambahkan 1
            $kodeUnik = str_pad($lastId, 3, '0', STR_PAD_LEFT); // Format 001, 002, dst.
            $motherboard->no_inventaris = 'LABKOM/MB/' . $kodeUnik . '/' . $motherboard->tahun;
        });
    }
}
