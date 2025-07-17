<?php

namespace App\Providers;

use App\Models\Laboratorium;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class LabPermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Skip in console since Filament Shield only runs on web
        if ($this->app->runningInConsole()) {
            return;
        }

        // Wait for the application to boot fully to ensure the database is available
        $this->app->booted(function () {
            try {
                // Create custom permissions for each laboratory
                $this->createLabPermissions();
            } catch (\Exception $e) {
                // Log error but don't crash during app startup
                // Typically would happen during fresh installation before migrations are run
                logger()->error('Failed to create lab permissions: ' . $e->getMessage());
            }
        });
    }

    /**
     * Create custom permissions for each lab in the system
     */
    protected function createLabPermissions(): void
    {
        // Check if the laboratories table exists (to prevent errors during fresh install)
        if (!\Schema::hasTable('laboratoria')) {
            return;
        }

        // Get all laboratories
        $laboratories = Laboratorium::all();

        // Define the actions we want to allow for each laboratory
        $labActions = ['view', 'manage', 'edit', 'delete'];

        // Create a permission for each lab and each action
        foreach ($laboratories as $lab) {
            $labSlug = strtolower(str_replace([' ', '.'], ['_', '_'], $lab->ruang));

            foreach ($labActions as $action) {
                $permissionName = "lab_{$action}_{$labSlug}";

                // Create the permission if it doesn't exist
                Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web'], [
                    'name' => $permissionName,
                    'guard_name' => 'web',
                    'description' => ucfirst($action) . ' ' . $lab->ruang . ' laboratory'
                ]);
            }
        }

        // Clear permission cache after adding new permissions
        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
