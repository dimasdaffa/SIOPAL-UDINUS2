<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Allow all users to view users
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return true; // Allow all users to view users
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Allow all users to create users
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return true; // Allow all users to update users
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return true; // Allow all users to delete users
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return true; // Allow all users to bulk delete users
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return true; // Allow all users to force delete users
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return true; // Allow all users to bulk force delete users
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, User $model): bool
    {
        return true; // Allow all users to restore users
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return true; // Allow all users to bulk restore users
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, User $model): bool
    {
        return true; // Allow all users to replicate users
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return true; // Allow all users to reorder users
    }
}
