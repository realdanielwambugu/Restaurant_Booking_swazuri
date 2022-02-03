<?php

Namespace App\providers;

use Xcholars\Validation\ValidationServiceProvider as ServiceProvider;


class ValidationServiceProvider extends ServiceProvider
{
   /**
    * The Validation rules mappings for the application.
    *
    * @var array
    */
    protected $mappings = [
        'signup' => \App\Validation\ForSignup::class,
        'login' => \App\Validation\ForLogin::class,
        'recipe' => \App\Validation\ForRecipe::class,
        'order' => \App\Validation\ForOrder::class,
        'category' => \App\Validation\ForCategory::class,
        'delivery' => \App\Validation\ForDelivery::class,

    ];
}
