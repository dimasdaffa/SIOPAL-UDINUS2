<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mouse extends Model
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

        static::creating(function ($mice) {
            $lastId = self::max('id') + 1; // Ambil ID terakhir & tambahkan 1
            $kodeUnik = str_pad($lastId, 3, '0', STR_PAD_LEFT); // Format 001, 002, dst.
            $mice->no_inventaris = 'LABKOM/MO/' . $kodeUnik . '/' . $mice->tahun;
        });
    }
}
