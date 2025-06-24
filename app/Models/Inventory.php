<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Inventory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Relasi polimorfik untuk mendapatkan model detail (PCDetail, NonPCDetail, dll).
     */
    public function inventoriable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Relasi ke model Laboratorium.
     */
    public function laboratorium(): BelongsTo
    {
        return $this->belongsTo(Laboratorium::class);
    }

    /**
     * Auto-generate nomor inventaris sebelum menyimpan
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($inventory) {
            // Ambil nama laboratorium
            $laboratorium = Laboratorium::find($inventory->laboratorium_id);
            $namaLab = $laboratorium ? strtoupper($laboratorium->ruang) : 'LAB';

            // Generate nomor inventaris untuk PCDetail
            if ($inventory->inventoriable_type === 'App\Models\PCDetail') {
                // Hitung nomor urut PC untuk lab ini (hanya yang sudah tersimpan)
                $existingPCs = self::where('laboratorium_id', $inventory->laboratorium_id)
                    ->where('inventoriable_type', 'App\Models\PCDetail')
                    ->whereNotNull('kode_inventaris')
                    ->count();

                $nomorUrut = str_pad($existingPCs + 1, 2, '0', STR_PAD_LEFT);

                // Format: UDN/LABKOM/INV/namalab/PC01
                $inventory->kode_inventaris = "UDN/LABKOM/INV/{$namaLab}/PC{$nomorUrut}";
            }

            // Generate nomor inventaris untuk NonPCDetail
            if ($inventory->inventoriable_type === 'App\Models\NonPCDetail') {
                // Hitung nomor urut Non-PC untuk lab ini (hanya yang sudah tersimpan)
                $existingNonPCs = self::where('laboratorium_id', $inventory->laboratorium_id)
                    ->where('inventoriable_type', 'App\Models\NonPCDetail')
                    ->whereNotNull('kode_inventaris')
                    ->count();

                $nomorUrut = str_pad($existingNonPCs + 1, 2, '0', STR_PAD_LEFT);

                // Format: UDN/LABKOM/INV/NON-PC/namalab/01
                $inventory->kode_inventaris = "UDN/LABKOM/INV/NON-PC/{$namaLab}/{$nomorUrut}";
            }

            // Generate nomor inventaris untuk SoftwareDetail
            if ($inventory->inventoriable_type === 'App\Models\SoftwareDetail') {
                // Hitung nomor urut Software untuk lab ini (hanya yang sudah tersimpan)
                $existingSoftware = self::where('laboratorium_id', $inventory->laboratorium_id)
                    ->where('inventoriable_type', 'App\Models\SoftwareDetail')
                    ->whereNotNull('kode_inventaris')
                    ->count();

                $nomorUrut = str_pad($existingSoftware + 1, 2, '0', STR_PAD_LEFT);

                // Format: UDN/LABKOM/INV/SOFTWARE/namalab/01
                $inventory->kode_inventaris = "UDN/LABKOM/INV/SOFTWARE/{$namaLab}/{$nomorUrut}";
            }
        });

        static::updating(function ($inventory) {
            // Jangan ubah nomor inventaris saat update
            if ($inventory->isDirty('kode_inventaris') && $inventory->getOriginal('kode_inventaris')) {
                $inventory->kode_inventaris = $inventory->getOriginal('kode_inventaris');
            }
        });
    }
}
