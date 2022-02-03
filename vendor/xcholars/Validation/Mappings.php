<?php

Namespace Xcholars\Validation;

use InvalidArgumentException;

class Mappings
{
   /**
    * The Validation rules mappings for the application.
    *
    * @var array
    */
    private $mappings = [];

   /**
    * Loaded Mappings instances
    *
    * @var array
    */
    private $loadedMappings = [];

   /**
    * default error messages for rules
    *
    * @var array
    */
    private $defaultMessages = [
        'required' => ':field is required',
        'min' => ':field must be minimumn of :satisfier characters',
        'max' => ':field must be maximum of :satisfier characters',
        'email' => ':field address is invalid',
        'alpha' => ':field must contain only letters and numbers',
        'match' => ':satisfier should match',
        'unique' => ':field is alredy taken',
    ];

   /**
    * add mappings to mappings colloection
    *
    * @return void
    */
    public function addMappings(array $mappings)
    {
        $this->mappings = $mappings;
    }

   /**
    * get mappings for the given activity
    *
    * @return object
    */
    public function getMappingsFor($activity)
    {
        if ($mappings = $this->loadedMappings[$activity] ?? null)
        {
            return $mappings;
        }

        if(!$mappings = $this->mappings[$activity] ?? null)
        {
            throw new InvalidArgumentException(
                "Validation Mappings for [{$activity}] not found"
            );
        }

        return $this->loadedMappings[$activity] = new $mappings;
    }

   /**
    * get rules for the given activity
    *
    * @return array
    */
    public function getRulesFor($activity)
    {
        return $this->getMappingsFor($activity)->rules();
    }

   /**
    * get error messages for the given rule and activity
    *
    * @return string
    */
    public function getMessageFor($rule, $activity = null)
    {
        $message = null;

        if (!is_null($activity))
        {
            $mappings = $this->getMappingsFor($activity);

            $message = $mappings->messages($rule);
        }

        return $message ?? $this->defaultMessages[$rule];
    }


}
