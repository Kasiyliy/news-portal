<?php


namespace App\Http\Controllers\Web\V1\System;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\Business\BusinessCategoryWebForm;
use App\Http\Forms\Web\V1\System\Content\Business\BusinessContentWebForm;
use App\Http\Forms\Web\V1\System\Content\GuideContentWebForm;
use App\Http\Requests\Web\V1\System\Content\Business\BusinessCategoryWebRequest;
use App\Http\Requests\Web\V1\System\Content\Business\BusinessContentWebRequest;
use App\Http\Requests\Web\V1\System\Content\GuideContentWebRequest;
use App\Models\Entities\Content\Business\BusinessCategory;
use App\Models\Entities\Content\Business\BusinessContent;
use App\Models\Entities\Content\GuideCategory;
use App\Models\Entities\Content\GuideContent;
use App\Services\Common\V1\Support\FileService;

class BusinessController extends WebBaseController
{
    protected $fileService;

    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function index()
    {
        $categories = BusinessCategory::orderBy('updated_at', 'desc')->paginate(10);
        $category_web_form = BusinessCategoryWebForm::inputGroups(null);
        return $this->adminView('pages.business.index', compact('categories', 'category_web_form'));
    }

    public function store(BusinessCategoryWebRequest $request)
    {

        try{
            $path = null;
            if ($request->file('file')) {
                $path = $this->fileService->store($request->file('file'), BusinessCategory::DEFAULT_RESOURCE_DIRECTORY);
            }
            BusinessCategory::create([
                'name' => $request->name,
                'image_path' => $path
            ]);
            $this->added();
            return redirect()->route('business.index');
        } catch (\Exception $exception){

            if($path) $this->fileService->remove($path);
            throw new WebServiceExplainedException($exception->getMessage());
        }


    }

    public function update($id, BusinessCategoryWebRequest $request)
    {
        try {
            $category = BusinessCategory::find($id);
            if (!$category) throw new WebServiceExplainedException('Категория не найдена!');
            $path = $category->image_path;

            if ($request->file('file')) {
                $path = $this->fileService->updateWithRemoveOrStore($request->file('file'), BusinessCategory::DEFAULT_RESOURCE_DIRECTORY,$path);
            }
            $category->update([
                'name' => $request->name,
                'image_path' => $path
            ]);

            $this->edited();
            return redirect()->route('business.index');
        }
        catch  (\Exception $exception){

            if($path) $this->fileService->remove($path);
            throw new WebServiceExplainedException($exception->getMessage());
        }
    }

    public function delete($id) {
        $category = BusinessCategory::find($id);
        if (!$category) throw new WebServiceExplainedException('Категория не найдена!');
        $this->fileService->remove($category->image_path);
        $category->contents()->delete();
        $category->delete();
        $this->deleted();
        return redirect()->route('business.index');

    }


    public function content($category_id)
    {
        $contents = BusinessContent::where('category_id', $category_id)->orderBy('updated_at', 'desc')->paginate(10);
        return $this->adminView('pages.business.content.index', compact('contents', 'category_id'));
    }

    public function contentCreate($category_id)
    {
        $content_web_form = BusinessContentWebForm::inputGroups(null);
        return $this->adminView('pages.business.content.create', compact('category_id', 'content_web_form'));
    }

    public function contentStore($category_id, BusinessContentWebRequest $request)
    {
        try {

            $category = BusinessCategory::find($category_id);
            if (!$category) throw new WebServiceExplainedException('Категория не найдена!');
            $path = null;
            if ($request->file('file')) {
                $path = $this->fileService->store($request->file('file'), BusinessContent::DEFAULT_RESOURCE_DIRECTORY);
            }

            BusinessContent::create([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $category_id,
                'image_path' => $path
            ]);
            $this->added();
            return redirect()->route('business.content.index', ['category_id' => $category_id]);
    }catch (\Exception $exception){

        if($path) $this->fileService->remove($path);
        throw new WebServiceExplainedException($exception->getMessage());
    }
    }

    public function contentEdit($id) {
        $content = BusinessContent::find($id);
        if (!$content) throw new WebServiceExplainedException('Контент не найден!');
        $category_id = $content->category_id;
        $content_web_form = BusinessContentWebForm::inputGroups($content);
        return $this->adminView('pages.business.content.edit', compact('category_id', 'content_web_form', 'content'));
    }

    public function contentUpdate($id, BusinessContentWebRequest $request) {
        try {
            $content = BusinessContent::find($id);
            if (!$content) throw new WebServiceExplainedException('Контент не найден!');
            $path = $content->image_path;

            if ($request->file('file')) {
                $path = $this->fileService->updateWithRemoveOrStore($request->file('file'), BusinessContent::DEFAULT_RESOURCE_DIRECTORY,$path);
            }

            $content->update([
                'title' => $request->title,
                'description' => $request->description,
                'image_path' => $path
            ]);
            $this->edited();
            return redirect()->route('business.content.index', ['category_id' => $content->category_id]);
        } catch (\Exception $exception){

            if($path) $this->fileService->remove($path);
            throw new WebServiceExplainedException($exception->getMessage());
        }
    }

    public function contentDelete($id) {
        $content = BusinessContent::find($id);
        if (!$content) throw new WebServiceExplainedException('Контент не найден!');
        $this->fileService->remove($content->image_path);
        $content->delete();
        $this->deleted();
        return redirect()->route('business.content.index', ['category_id' => $content->category_id]);
    }
}
