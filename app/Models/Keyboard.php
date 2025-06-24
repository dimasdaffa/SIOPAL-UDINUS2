<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
    protected $fillable = [
        'merk',
        'tipe',
        'tahun',
        'bulan',
        'stok',
    ];

    /**
     * Accessor untuk mendapatkan nama lengkap (merk + tipe)
     */
    public function getFullNameAttribute(): string
    {
        return $this->merk . '-' . $this->tipe;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($keyboard) {
            $lastId = self::max('id') + 1; // Ambil ID terakhir & tambahkan 1
            $kodeUnik = str_pad($lastId, 3, '0', STR_PAD_LEFT); // Format 001, 002, dst.
            $keyboard->no_inventaris = 'LABKOM/KB/' . $kodeUnik . '/' . $keyboard->tahun;
        });
    }
}
