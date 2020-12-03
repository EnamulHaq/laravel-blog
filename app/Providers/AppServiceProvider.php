<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
class AppServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        /* Define admin role */
        Gate::define('isAdmin', function($user){
            return $user->role == 'admin';
        });
        /* Define user role */
        Gate::define('isUser', function($user){
            return $user->role == 'user';
        });
        /* Define manager role */
        Gate::define('isManager', function($user) {
            return $user->role == 'manager';
        });
    }
}
