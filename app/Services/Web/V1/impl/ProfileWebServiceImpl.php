<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 22:48
 */

namespace App\Services\Web\V1\impl;


use App\Services\BaseService;
use App\Services\Common\V1\Support\FileService;
use App\Services\Web\V1\ProfileWebService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileWebServiceImpl extends BaseService implements ProfileWebService
{

    protected $fileService;

    /**
     * ProfileWebServiceImpl constructor.
     * @param $fileService
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }


    public function changePassword($currentUser, $oldPassword, $newPassword)
    {
        if (Hash::check($oldPassword, $currentUser->password)) {
            $currentUser->password = bcrypt($newPassword);
            $currentUser->save();
        } else {
            throw ValidationException::withMessages([
                'current_password' => [trans('auth.failed')],
            ]);
        }
    }

    public function updateProfile($currentUser, $name, $status, UploadedFile $file = null)
    {
        DB::beginTransaction();
        try {
            $currentUser->name = $name;
            $currentUser->status = $status;
            if ($file) {
                $oldFile = $currentUser->avatar;
                $newAppFile = $this->fileService->putFile($file);
                $currentUser->avatar_file_id = $newAppFile->id;
                $this->fileService->removeFile($oldFile);
            }
            $currentUser->save();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->webFail($exception->getMessage());
        }
    }

}