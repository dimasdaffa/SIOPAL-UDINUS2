<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangKeluar extends Model
{
    protected $table = 'barang_keluar';

    protected $fillable = [
        'no_inventaris',
        'nama_barang',
        'jumlah',
        'tanggal',
        'laboratorium_id',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Get the laboratory that this item belongs to.
     */
    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class);
    }
}
