<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Headphone extends Model
{
    protected $fillable = [
        'merk',
        'nama',
        'spesifikasi',
        'tahun',
        'bulan',
        'stok',
    ];

    /**
     * Accessor untuk mendapatkan nama lengkap (merk + nama)
     */
    public function getFullNameAttribute(): string
    {
        return $this->merk . '-' . $this->nama;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($headphones) {
            $lastId = self::max('id') + 1; // Ambil ID terakhir & tambahkan 1
            $kodeUnik = str_pad($lastId, 3, '0', STR_PAD_LEFT); // Format 001, 002, dst.
            $headphones->no_inventaris = 'LABKOM/HP/' . $kodeUnik . '/' . $headphones->tahun;
        });
    }
}
