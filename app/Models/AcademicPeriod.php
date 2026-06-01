<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcademicPeriod extends Model
{
    protected $fillable = [
        'tahun_ajaran',
        'semester',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Boot method: saat periode di-set aktif, nonaktifkan semua periode lain.
     */
    protected static function booted(): void
    {
        static::saving(function (AcademicPeriod $period) {
            if ($period->is_active) {
                // Nonaktifkan semua periode lain
                static::where('id', '!=', $period->id ?? 0)
                    ->where('is_active', true)
                    ->update(['is_active' => false]);
            }
        });
    }

    /**
     * Relasi ke Schedule
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    /**
     * Scope: hanya periode aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Mendapatkan periode aktif saat ini
     */
    public static function getActive(): ?self
    {
        return static::where('is_active', true)->first();
    }

    /**
     * Mendapatkan ID periode aktif saat ini
     */
    public static function getActiveId(): ?int
    {
        return static::where('is_active', true)->value('id');
    }

    /**
     * Label readable, contoh: "2025/2026 Ganjil"
     */
    public function getLabelAttribute(): string
    {
        $semesterLabel = ucfirst($this->semester);
        return "{$this->tahun_ajaran} {$semesterLabel}";
    }

    /**
     * Label lengkap dengan status, contoh: "2025/2026 Ganjil (Aktif)"
     */
    public function getFullLabelAttribute(): string
    {
        $label = $this->label;
        if ($this->is_active) {
            $label .= ' (Aktif)';
        }
        return $label;
    }
}
