<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

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

        Gate::define('isAdmin', function(User $user){
            return $user->role->name === 'admin' ?
                Response::allow() :
                Response::deny('Tук е само са администратори!');
        });

        Gate::define('isManager', function(User $user){
            return $user->role->name === 'manager' ?
                Response::allow() :
                Response::deny('Tук е само са мениджъри!');
        });

        Gate::define('isUser', function(User $user){
            return $user->role->name === 'user' ?
                Response::allow() :
                Response::deny('Нямате достъп!');
        });
    }
}
