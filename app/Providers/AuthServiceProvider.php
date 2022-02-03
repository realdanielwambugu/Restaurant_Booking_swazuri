<?php

Namespace App\providers;

use Xcholars\Auth\AuthServiceProvider as ServiceProvider;

use Xcholars\Support\Proxies\Gate;

class AuthServiceProvider extends ServiceProvider
{
   /**
    * The policy mappings for the application.
    *
    * @var array
    */
    protected $policies = [
        \App\Models\User::class => \App\Policies\UserPolicy::class,
    ];

   /**
    * register bindings with the service container.
    *
    * @return object
    */
    public function register()
    {
         Parent::register();
    }

   /**
    * Activities to be performed after bindings are registerd.
    *
    * @return void
    */
    public function boot()
    {
        Gate::define('admin_only', function ($user)
        {
            return $user->isAdmin();
        });

        Gate::define('chef_only', function ($user)
        {
            return $user->isChef();
        });

        Gate::define('mealDeliverer_only', function ($user)
        {
            return $user->isMealDeliverer();
        });

        Gate::define('customer_only', function ($user)
        {
            return $user->isCustomer();
        });
    }
}
