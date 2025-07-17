<?php

namespace App\Policies\Traits;

use App\Models\User;

trait SuperAdminPolicy
{
    /**
     * Check if user is super_admin before any policy method
     *
     * @param User $user
     * @param string $ability
     * @return bool|null
     */
    public function before(User $user, $ability)
    {
        // If user is a super_admin, they can do anything
        if ($user->hasRole('super_admin')) {
            return true;
        }

        // Otherwise, fall back to specific permission checks
        return null;
    }
}
