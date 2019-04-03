<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DifferenceBiggerThan implements Rule
{
    private $offset;
    private $compareVal;

    /**
     * Create a new rule instance.
     *
     * @param $offset
     * @param $compareVal
     */
    public function __construct($offset, $compareVal)
    {
        $this->offset = $offset;
        $this->compareVal = $compareVal;
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
        return $value > ($this->offset+ $this->compareVal);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The difference is smaller than the set amount';
    }
}
