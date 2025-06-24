<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VGA extends Model
{
    protected $fillable = [
        'no_inventaris',
        'merk',
        'tipe',
        'kapasitas',
        'spesifikasi',
        'tahun',
        'bulan',
        'stok'
    ];

    /**
     * Accessor untuk mendapatkan nama lengkap (merk + tipe + kapasitas)
     */
    public function getFullNameAttribute(): string
    {
        return $this->merk . '-' . $this->tipe . '-' . $this->kapasitas . 'GB';
    }

    // Auto-generate Nomor Inventaris sebelum menyimpan
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vga) {
            $tipe = strtoupper($vga->tipe); // Pastikan huruf besar (SSD/HDD)
            $id = VGA::max('id') + 1; // Ambil ID terakhir + 1
            $vga->no_inventaris = "LABKOM/VG/" . str_pad($id, 3, '0', STR_PAD_LEFT).'/'. $vga->tahun;
        });
    }
}
