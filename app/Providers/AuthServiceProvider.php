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

        Gate::define('comment-delete', function ($user, $comment) {
            return $user->id == $comment->user_id;
        });

        Gate::define('comment-edit', function ($user, $comment) {
            return $user->id == $comment->user_id;
        });

        Gate::define('admin-auth', function ($user, $role) {
            return $user->role == $role;
        });
    }
}