<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class YearRule implements Rule
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
        $now = Carbon::now();
        $user_century = substr($value, 6,-5);
        $year = substr($value, 0,-10);

        if($user_century == 5 || $user_century == 6){
            $year = 2000 + $year;

            return date('Y')- $year >= 18;

        }else{

            return true;
        }



    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Регистрироваться могут лица старше 18 лет';
    }
}
