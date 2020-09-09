<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 19:03
 */

namespace App\Http\Requests\Api\V1\Auth;


use App\Http\Requests\Api\ApiBaseRequest;
use App\Models\Entities\Core\Role;
use Illuminate\Validation\Rule;

class RegisterApiRequest extends ApiBaseRequest
{
    public function injectedRules()
    {
        return [
            'phone' => ['required', 'unique:users,phone'],
            'password' => ['required'],
            'role_id' => ['required', Rule::in([
                Role::CLIENT_ID,
                Role::ORGANIZATION_ID
            ])]
        ];
    }

}