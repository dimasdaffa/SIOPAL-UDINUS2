<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PSU extends Model
{
    protected $fillable = [
        'merk',
        'tipe',
        'daya',
        'efisiensi',
        'tahun',
        'bulan',
        'stok',
    ];

    /**
     * Accessor untuk mendapatkan nama lengkap (merk + tipe + daya)
     */
    public function getFullNameAttribute(): string
    {
        return $this->merk . '-' . $this->tipe . ' ' . $this->daya . 'W';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($psu) {
            $tipe = strtoupper($psu->tahun);
            $id = PSU::max('id') + 1; // Ambil ID terakhir + 1
            $psu->no_inventaris = "LABKOM/PSU/" . str_pad($id, 3, '0', STR_PAD_LEFT).'/'. $psu->tahun;
        });
    }
}
