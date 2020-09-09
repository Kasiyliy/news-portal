<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 13:28
 */

namespace App\Http\Controllers\Web\V1\System;


use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\ChangePasswordWebForm;
use App\Http\Forms\Web\V1\System\UpdateProfileWebForm;
use App\Http\Requests\Web\V1\System\User\ChangePasswordWebRequest;
use App\Http\Requests\Web\V1\System\User\UpdateProfileWebRequest;
use App\Services\Web\V1\ProfileWebService;

class UserController extends WebBaseController
{

    protected $profileWebService;

    /**
     * UserController constructor.
     * @param $profileWebService
     */
    public function __construct(ProfileWebService $profileWebService)
    {
        $this->profileWebService = $profileWebService;
    }


    public function profile()
    {
        $changePasswordForm = ChangePasswordWebForm::inputGroups(null);
        $updateProfileForm = UpdateProfileWebForm::inputGroups(auth()->user());
        return $this->adminView('pages.system.profile', compact('changePasswordForm', 'updateProfileForm'));
    }

    public function changePassword(ChangePasswordWebRequest $request)
    {
        $this->profileWebService->changePassword(
            $this->getCurrentUser(),
            $request->current_password,
            $request->password
        );
        $this->edited();
        return $this->back();
    }

    public function updateProfileInfo(UpdateProfileWebRequest $request)
    {
        $this->profileWebService->updateProfile(
            $this->getCurrentUser(),
            $request->name,
            $request->status,
            $request->file('file')
        );
        $this->edited();
        return $this->back();
    }
}