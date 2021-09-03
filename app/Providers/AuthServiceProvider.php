<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {
            return $user->role1 == 'admin';
        });
        Gate::define('isApproval', function ($user) {
            return $user->role1 == 'approval';
        });
        Gate::define('isBm', function ($user) {
            return $user->role1 == 'bm';
        });
        Gate::define('isSecurity', function ($user) {
            return $user->role1 == 'security';
        });
        Gate::define('isHead', function ($user) {
            return $user->role1 == 'head';
        });
    }
}
