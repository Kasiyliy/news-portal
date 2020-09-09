<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 23:54
 */

namespace App\Http\Requests\Web\V1\System\User;


use App\Http\Requests\Web\WebBaseRequest;

class ChangePasswordWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'current_password' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'confirmed', 'max:255'],
        ];
    }

}