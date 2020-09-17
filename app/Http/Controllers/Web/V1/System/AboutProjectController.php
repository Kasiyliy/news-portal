<?php

namespace App\Http\Controllers\Web\V1\System;


use App\Http\Controllers\Web\WebBaseController;
use App\Http\Requests\Web\V1\System\Content\AboutProjectWebRequest;
use App\Models\Entities\Content\AboutImage;
use App\Models\Entities\Content\AboutProject;
use App\Services\Common\V1\Support\FileService;
use App\Http\Forms\Web\V1\System\Content\AboutProjectWebForm;
use Carbon\Carbon;


class AboutProjectController extends WebBaseController
{

    protected $fileService;

    /**
     * SliderController constructor.
     * @param $fileService
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }


    public function index()
    {
        $about_project = AboutProject::with(['images'])->first();
        $about_project_form = AboutProjectWebForm::inputGroups($about_project);
        return $this->adminView('pages.about-project.index', compact('about_project', 'about_project_form'));
    }


    public function update(AboutProjectWebRequest $request)
    {
        $about_project = AboutProject::with(['images'])->first();

        $main_image = $about_project->main_image;


        $footer_image = $about_project->footer_image;
        if ($request->file('main_image')) {
            $main_image = $this->fileService->store($request->file('main_image'), AboutProject::DEFAULT_RESOURCE_DIRECTORY);
        }

        if ($request->file('footer_image')) {
            $footer_image = $this->fileService->store($request->file('footer_image'), AboutProject::DEFAULT_RESOURCE_DIRECTORY);
        }
        $about_project->update([
            'main_title' => $request->main_title,
            'main_description' => $request->main_description,
            'main_image' => $main_image,
            'footer_title' => $request->footer_title,
            'footer_image' => $footer_image,
            'footer_address' => $request->footer_address,
            'footer_number' => $request->footer_number
        ]);

        $appFiles = [];
        $now = Carbon::now();
        if ($request->has('about_image')) {
            $about_images = $request->about_image;
            foreach ($about_images as $image) {
                $appFiles[] = [
                    'image_path' => $this->fileService->store($image, AboutProject::DEFAULT_RESOURCE_DIRECTORY),
                    'about_project_id' => $about_project->id,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
        }
        AboutImage::insert($appFiles);

        $this->edited();
        return redirect()->back();
    }
}
