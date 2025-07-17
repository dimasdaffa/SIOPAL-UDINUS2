<?php

namespace App\Traits;

use App\Models\Laboratorium;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

trait HasLabPermissions
{
    /**
     * Check if user has permission to access specific lab
     *
     * @param string|int $lab ID or ruang of the lab
     * @param string $action Action (view, manage, edit, delete)
     * @return bool
     */
    public function hasLabPermission($lab, string $action = 'view'): bool
    {
        // Super admin can access everything
        if ($this->hasRole('super_admin')) {
            return true;
        }

        if (is_numeric($lab)) {
            // If lab ID is provided, get the lab ruang
            $laboratory = Laboratorium::find($lab);
            if (!$laboratory) {
                return false;
            }
            $labName = $laboratory->ruang;
        } else {
            // Lab name was provided directly
            $labName = $lab;
        }

        $labSlug = strtolower(str_replace([' ', '.'], ['_', '_'], $labName));
        $permissionName = "lab_{$action}_{$labSlug}";

        return $this->can($permissionName);
    }

    /**
     * Get all labs the user has permission to access
     *
     * @param string $action Action (view, manage, edit, delete)
     * @return array
     */
    public function getAuthorizedLabIds(string $action = 'view'): array
    {
        // Cache key unique to this user and action
        $cacheKey = "user_{$this->id}_lab_permissions_{$action}";

        // Cache the results for 1 hour to improve performance
        return Cache::remember($cacheKey, 3600, function() use ($action) {
            // Super admin can access all labs
            if ($this->hasRole('super_admin')) {
                return Laboratorium::pluck('id')->toArray();
            }

            $authorizedLabs = [];
            $laboratories = Laboratorium::all();

            foreach ($laboratories as $lab) {
                $labSlug = strtolower(str_replace([' ', '.'], ['_', '_'], $lab->ruang));
                $permissionName = "lab_{$action}_{$labSlug}";

                if ($this->can($permissionName)) {
                    $authorizedLabs[] = $lab->id;
                }
            }

            return $authorizedLabs;
        });
    }

    /**
     * Apply lab permission filter to a query
     *
     * @param Builder $query
     * @param string $action
     * @return Builder
     */
    public function scopeFilterByLabPermission(Builder $query, string $labIdField = 'laboratorium_id', string $action = 'view'): Builder
    {
        // Super admin has access to everything
        if ($this->hasRole('super_admin')) {
            return $query;
        }

        $authorizedLabIds = $this->getAuthorizedLabIds($action);

        return $query->whereIn($labIdField, $authorizedLabIds);
    }
}
