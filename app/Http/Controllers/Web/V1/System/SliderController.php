<?php

namespace App\Http\Controllers\Web\V1\System;


use App\Core\Utils\FileUtil;
use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\SliderWebForm;
use App\Http\Requests\Web\V1\System\Content\SliderWebRequest;
use App\Models\Entities\Content\Slider;
use App\Services\Common\V1\Support\FileService;


class SliderController extends WebBaseController
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
        $slider = Slider::paginate(10);
        return $this->adminView('pages.slider.index', compact('slider'));
    }

    public function create()
    {
        $slider_form = SliderWebForm::inputGroups(null);
        return $this->adminView('pages.slider.create', compact('slider_form'));
    }

    public function store(SliderWebRequest $request)
    {
        $path = FileUtil::defaultSliderPath();
        if ($request->file('file')) {
            $path = $this->fileService->store($request->file('file'), Slider::DEFAULT_RESOURCE_DIRECTORY);
        }
        Slider::create([
            'title' => $request->title,
            'image_path' => $path
        ]);
        $this->added();
        return redirect()->route('slider.index');
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        if (!$slider) {
            throw new WebServiceExplainedException('Слайдер не найден!');
        }
        $slider_form = SliderWebForm::inputGroups($slider);
        return $this->adminView('pages.slider.edit', compact('slider_form', 'slider'));

    }

    public function update($id, SliderWebRequest $request)
    {
        $slider = Slider::find($id);
        if (!$slider) {
            throw new WebServiceExplainedException('Слайдер не найден!');
        }
        $path = $slider->image_path;

        if ($request->file('file')) {
            $path = $this->fileService->updateWithRemoveOrStore($request->file('file'), Slider::DEFAULT_RESOURCE_DIRECTORY);
        }
        $slider->update([
            'title'=>$request->title,
            'image_path'=>$path
        ]);
        $this->edited();
        return redirect()->route('slider.index');
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        if (!$slider) {
            throw new WebServiceExplainedException('Слайдер не найден!');
        }
        $this->fileService->remove($slider->image_path);
        $slider->delete();
        $this->deleted();
        return redirect()->route('slider.index');
    }
}
