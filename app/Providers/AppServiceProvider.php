<?php

namespace App\Providers;

use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Gate::before(function ($user, $ability) {
            if ($user->is_admin == 1) return true;
        });

        try {

            DB::connection()->getPdo();

            if (Schema::hasTable('roles')) {
                $roles = Role::with('permissions')->get();

                $permissionsArray = [];

                foreach ($roles as $role) {
                    foreach ($role->permissions as $permissions) {
                        $permissionsArray[$permissions->code][] = $role->id;
                    }
                }

                foreach ($permissionsArray as $name => $roles) {
                    Gate::define($name, function ($user) use ($roles) {
                        return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0 || $user->is_admin == 1;
                    });
                }
            }
        } catch (\Exception $e) {
            // Handle the exception if the database is not connected or the table does not exist
            // For example, log the error or notify the administrator
            Log::error($e->getMessage());
        }
    }
}
