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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('posts', 'App\Policies\PostPolicy');
        Gate::resource('admins', 'App\Policies\AdminUserPolicy');
        Gate::define('admins.role', 'App\Policies\AdminUserPolicy@role');
        Gate::define('posts.tag', 'App\Policies\PostPolicy@tag');
        Gate::define('posts.category', 'App\Policies\PostPolicy@category');
    }
}