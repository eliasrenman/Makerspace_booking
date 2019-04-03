<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class afterToday implements Rule
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
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value >= strtotime(date('Y-m-d') . "T" . "00:00");
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Datument har redan passerat!';
    }
}
