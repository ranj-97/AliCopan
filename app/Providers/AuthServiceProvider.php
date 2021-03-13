<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        Gate::define('isSuperAdmin', function (User $user) {
            return $user->role_name ==='superadmin';
        });
        Gate::define('isAdmin', function (User $user) {
            return $user->role_name ==='admin';
        });
        Gate::define('isUser', function (User $user) {
            return $user->role_name ==='user';
        });
        Gate::define('isManager', function (User $user) {
            return $user->role_name ==='manager';
        });
       
        Passport::routes();
        // Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');
    }
}
