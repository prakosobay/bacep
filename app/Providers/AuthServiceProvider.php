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
            return $user->slug == 'admin';
        });
        Gate::define('isApproval', function ($user) {
            return $user->slug == 'approval';
        });
        Gate::define('isBm', function ($user) {
            return $user->slug == 'bm';
        });
        Gate::define('isSecurity', function ($user) {
            return $user->slug == 'security';
        });
        Gate::define('isHead', function ($user) {
            return $user->slug == 'head';
        });
        Gate::define('isVisitor', function ($user) {
            return $user->slug == 'visitor';
        });

        Gate::define('isEksternal', function ($user) {
            $arrole = [];
            foreach ($user->roles as $rolee) {
                $arrole[] = $rolee->name;
            }
            return $arrole[0] == 'eksternal';
        });

        Gate::define('isInternal', function ($user) {
            $arrole = [];
            foreach ($user->roles as $rolee) {
                $arrole[] = $rolee->name;
            }
            return $arrole[0] == 'internal';
        });
    }
}
