<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Jxlwqq\IdValidator\IdValidator;

class IdCardRule implements Rule
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
        //
        $idValidator = new IdValidator();
        return $idValidator->isValid($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '身份证号码不合法';
    }
}
