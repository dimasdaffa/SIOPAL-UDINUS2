<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Laboratorium extends Model
{
    protected $guarded = ['id'];

    protected $table='laboratoria';

    protected $fillable = [
        'kategori_id',
        'ruang',
        'kapasitas',
        'keterangan',
        'pc_siap',
        'pc_backup',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        // Temporarily commenting out the global scope to debug 500 error
        /*
        static::addGlobalScope('lab-permissions', function (Builder $builder) {
            // Skip scope for console commands or when no user is authenticated
            if (app()->runningInConsole() || !Auth::check()) {
                return;
            }

            $user = Auth::user();

            // Super admin can see all labs, no filtering needed
            if ($user->hasRole('super_admin')) {
                return;
            }

            // For all other users, only show labs they have permission to access
            $authorizedLabIds = $user->getAuthorizedLabIds('view');
            $builder->whereIn('id', $authorizedLabIds);
        });
        */
    }

    public function kategori()
    {
        return $this->belongsTo(KlasifikasiLab::class, 'kategori_id');
    }
}
