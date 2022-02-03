<?php

Namespace App\Validation;

class ForRecipe
{
   /**
    * Validation rules defination.
    *
    * @return array
    */
    public function rules()
    {
        return [
            'photo' => 'required',
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
        ];
    }

   /**
    * Error messages mappings.
    *
    * @param string|null $rule
    * @return array
    */
    public function messages($rule = null)
    {
        $messages = [

        ];

        return  $messages[$rule] ?? $messages;
    }



}
