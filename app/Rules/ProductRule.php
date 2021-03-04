<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ProductRule implements Rule
{
    public $product;
    public $productVarian;

    /**
     * Create a new rule instance.
     *
     * @param $product
     */
    public function __construct($product)
    {
        $this->product = $product;
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

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
