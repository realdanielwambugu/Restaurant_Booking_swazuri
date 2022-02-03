<?php

Namespace Xcholars\Validation;

use Xcholars\provider\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
{

   /**
    * The Validation rules mappings for the application.
    *
    * @var array
    */
    protected $mappings = [];

  /**
   * register bindings with the service container.
   *
   * @return object
   */
   public function register()
   {
       $this->app->singleton(\Xcholars\Validation\Mappings::class);
   }

  /**
   * Activities to be performed after bindings are registerd.
   *
   * @return void
   */
   public function boot()
   {
        $collection = $this->app->make(\Xcholars\Validation\Mappings::class);

        $collection->addMappings($this->mappings);

        \Xcholars\Validation\Factory::setApp($this->app);
   }
}
