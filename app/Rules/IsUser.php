<?php

namespace App\Rules;

use App\Models\Entities\Core\Role;
use App\Models\Entities\Core\User;
use Illuminate\Contracts\Validation\Rule;

class IsUser implements Rule
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
        $user = User::where('email',$value)->first();
        if($user->role_id == Role::CLIENT_ID){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Неверное имя пользователя или пароль';
    }
}
