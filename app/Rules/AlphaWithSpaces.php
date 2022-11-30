<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlphaWithSpaces implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚ]+$/";
        return preg_match($pattern, $value);;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'el campo :attribute  solo puede contener letras.';
    }
}
