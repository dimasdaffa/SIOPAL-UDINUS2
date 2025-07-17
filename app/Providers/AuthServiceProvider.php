<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Define your model policies here if needed
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Register all defined policies
        $this->registerPolicies();

        // Define a universal "before" gate to grant all abilities to super_admin
        Gate::before(function ($user, $ability) {
            // Check if the user has super_admin role
            if ($user->hasRole('super_admin')) {
                return true; // Super admin can do anything
            }
        });
    }
}
