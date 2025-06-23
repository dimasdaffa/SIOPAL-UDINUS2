<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RAM extends Model
{
    //
    protected $fillable = [
        'no_inventaris',
        'merk',
        'tipe',
        'kapasitas',
        'bulan',
        'stok',
        'tahun',
    ];

    // Auto-generate Nomor Inventaris sebelum menyimpan
    protected static function boot()
    {
        parent::boot();

       static::creating(function ($ram) {
            $tipe = strtoupper($ram->tahun);
            $id = RAM::max('id') + 1; // Ambil ID terakhir + 1
            $ram->no_inventaris = "LABKOM/RAM/" . str_pad($id, 3, '0', STR_PAD_LEFT).'/'. $ram->tahun;
        });
    }
}
