<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 16:28
 */

namespace App\Services\Api\V1\Core\impl;


use App\Core\Utils\JwtUtil;
use App\Exceptions\Api\ApiServiceException;
use App\Models\Entities\Core\User;
use App\Models\Enums\ErrorCode;
use App\Services\Api\V1\Core\AuthService;
use App\Services\BaseService;
use App\Services\Common\V1\Support\CodeService;
use Illuminate\Support\Facades\Hash;

class AuthServiceImpl extends BaseService implements AuthService
{

    protected $codeService;

    /**
     * AuthServiceImpl constructor.
     * @param $codeService
     */
    public function __construct(CodeService $codeService)
    {
        $this->codeService = $codeService;
    }


    public function login($phone, $password)
    {
        $user = User::where('phone', $phone)->first();
        if (!Hash::check($password, $user->password)) {
            $this->apiFail([
                'errorCode' => ErrorCode::AUTH_ERROR,
                'errors' => [
                    trans('auth.failed')
                ]
            ]);
        }
        return [
            'token' => JwtUtil::generateTokenFromUser($user),
            'user' => $user
        ];
    }

    public function register($phone, $role_id, $password)
    {
        $user = User::create([
            'phone' => $phone,
            'role_id' => $role_id,
            'password' => bcrypt($password)
        ]);
        return [
            'token' => JwtUtil::generateTokenFromUser($user)
        ];
    }

    public function sendCode($phone)
    {
        $this->codeService->generateCode($phone);
        return [
            'message' => 'sent'
        ];
    }

    public function me()
    {
        return auth()->user();
    }

    public function changePassword($phone, $password, $code)
    {
        if (!$this->codeService->checkCode($phone, $password)) {
            $this->apiFail([
                'errors' => [
                    trans('auth.invalid.code')
                ],
                'errorCode' => ErrorCode::INVALID_CODE
            ]);
        }

        $user = User::where('phone', $phone)->first();
        if (!$user) {
            $this->apiFail([
                'errorCode' => ErrorCode::RESOURCE_NOT_FOUND,
                'errors' => [
                    trans('actions.not.found')
                ]
            ]);
        }

        $user->password = bcrypt($password);
        $user->save();
        return [
            'message' => trans('actions.edited')
        ];
    }


}