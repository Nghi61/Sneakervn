<?php
namespace App\Rules;

use Illuminate\Validation\Rule;

class CustomValidationRules extends Rule
{
    public function passes($attribute, $value)
    {
        // The custom validation logic here
        $quantity = request()->input('quantity', 0);
        return count($value) === (int) $quantity;
    }
        public function __toString()
        {
            return 'This is a custom validation rule';
        }
    }
