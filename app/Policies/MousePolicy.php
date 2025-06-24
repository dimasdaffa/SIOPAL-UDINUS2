<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Mouse;
use Illuminate\Auth\Access\HandlesAuthorization;

class MousePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Allow all users to view hardware
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Mouse $mouse): bool
    {
        return true; // Allow all users to view hardware
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Allow all users to create hardware
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Mouse $mouse): bool
    {
        return true; // Allow all users to update hardware
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Mouse $mouse): bool
    {
        return true; // Allow all users to delete hardware
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return true; // Allow all users to bulk delete hardware
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Mouse $mouse): bool
    {
        return true; // Allow all users to force delete hardware
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return true; // Allow all users to bulk force delete hardware
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Mouse $mouse): bool
    {
        return true; // Allow all users to restore hardware
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return true; // Allow all users to bulk restore hardware
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Mouse $mouse): bool
    {
        return true; // Allow all users to replicate hardware
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return true; // Allow all users to reorder hardware
    }
}
