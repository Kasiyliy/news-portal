<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 29.07.2020
 * Time: 00:31
 */

namespace App\Http\Requests\Web\V1\System\User;


use App\Http\Requests\Web\WebBaseRequest;

class UpdateProfileWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'file' => ['nullable', 'image'],
        ];
    }

}