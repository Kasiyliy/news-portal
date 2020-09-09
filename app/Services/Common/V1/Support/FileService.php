<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 13.07.2020
 * Time: 16:35
 */

namespace App\Services\Common\V1\Support;


use App\Models\Entities\Support\AppFile;
use Illuminate\Http\UploadedFile;

interface FileService
{
    public function putFile(UploadedFile $file, $directory = 'files'): AppFile;

    public function removeFile(AppFile $appFile);

    public function getFile($filename);

    public function getFileByRelativePath($relative_path);
}