<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 16:30
 */

namespace App\Http\Requests\Api\V1\Auth;


use App\Http\Requests\Api\ApiBaseRequest;

class LoginApiRequest extends ApiBaseRequest
{
    public function injectedRules()
    {
        return [
            'phone' => ['required', 'numeric', 'exists:users,phone'],
            'password' => ['required']
        ];
    }

}