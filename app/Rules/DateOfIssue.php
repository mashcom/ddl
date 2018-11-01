<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class DateOfIssue implements Rule
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
        $date_of_issue = (int)date_format(date_create($value), 'Y');
        $current_year = (int)date_format(now(),'Y');
        //dd($date_of_issue<$current_year);
        return ($date_of_issue<=$current_year);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Date of Issue cannot be in the future';
    }
}
