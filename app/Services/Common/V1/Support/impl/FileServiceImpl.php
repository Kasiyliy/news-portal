<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 13.07.2020
 * Time: 16:35
 */

namespace App\Services\Common\V1\Support\impl;


use App\Models\Entities\Support\AppFile;
use App\Services\BaseService;
use App\Services\Common\V1\Support\FileService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileServiceImpl extends BaseService implements FileService
{
    public function putFile(UploadedFile $file, $directory = 'files'): AppFile
    {
        $path = $file->store($directory);
        $basename = basename($path);
        $relativePath = "$directory/$basename";
        return AppFile::create([
            'filename' => $basename,
            'relative_path' => $relativePath,
            'cloud_url' => Storage::url($path),
            'system_url' => route('system.files', ['image' => $relativePath]),
        ]);
    }

    public function removeFile(AppFile $appFile)
    {
        Storage::delete($appFile->relative_path);
        $appFile->delete();
    }

    public function getFile($filename)
    {
        return AppFile::where('filename', $filename)->first();
    }

    public function getFileByRelativePath($relative_path)
    {
        if (!Storage::exists($relative_path)) {
            abort(404);
        }
        return Storage::response($relative_path);
    }


}