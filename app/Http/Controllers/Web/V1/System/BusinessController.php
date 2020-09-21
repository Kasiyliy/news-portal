<?php


namespace App\Http\Controllers\Web\V1\System;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\Business\BusinessCategoryWebForm;
use App\Http\Forms\Web\V1\System\Content\Business\BusinessChildCategoryWebForm;
use App\Http\Forms\Web\V1\System\Content\Business\BusinessContentWebForm;
use App\Http\Forms\Web\V1\System\Content\GuideContentWebForm;
use App\Http\Requests\Web\V1\System\Content\Business\BusinessCategoryWebRequest;
use App\Http\Requests\Web\V1\System\Content\Business\BusinessChildCategoryRequest;
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
        $categories = BusinessCategory::where('parent_category_id',null)->orderBy('updated_at', 'desc')->paginate(10);
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
        $this->deleteChildCategories($id);
        $category->delete();
        $this->deleted();
        return redirect()->route('business.index');

    }






    public function childCategory($category_id)
    {
        $categories = BusinessCategory::where('parent_category_id',$category_id)->orderBy('updated_at', 'desc')->paginate(10);
        $category_web_form = BusinessChildCategoryWebForm::inputGroups(null);
        $parent_category = BusinessCategory::find($category_id);
        return $this->adminView('pages.business.category', compact('category_id','categories', 'category_web_form','parent_category'));
    }

    public function childCategoryStore($category_id,BusinessChildCategoryRequest $request)
    {

        try{

            BusinessCategory::create([
                'name' => $request->name,
                'parent_category_id' => $category_id
            ]);
            $this->added();
            return redirect()->route('business.category.index', ['category_id' => $category_id]);
        } catch (\Exception $exception){

            throw new WebServiceExplainedException($exception->getMessage());
        }


    }

    public function childCategoryUpdate($category_id, BusinessChildCategoryRequest $request)
    {
        try {
            $category = BusinessCategory::find($category_id);
            if (!$category) throw new WebServiceExplainedException('Категория не найдена!');


            $category->update([
                'name' => $request->name,
            ]);

            $this->edited();
            return redirect()->route('business.category.index', ['category_id' => $category->parent_category_id]);
        }
        catch  (\Exception $exception){

            throw new WebServiceExplainedException($exception->getMessage());
        }
    }

    public function childCategoryDelete($id) {
        $category = BusinessCategory::find($id);

        if (!$category) throw new WebServiceExplainedException('Категория не найдена!');
        $this->deleteContentsImages($category->id);
        $category->contents()->delete();
        $category->delete();
        $this->deleted();
        return redirect()->route('business.category.index',['category_id' => $category->parent_category_id]);

    }





    public function content($category_id)
    {
        $contents = BusinessContent::where('category_id', $category_id)->orderBy('updated_at', 'desc')->paginate(10);
        $category = BusinessCategory::find($category_id);
        $parent_category_id = $category->parent_category_id;
        $category_name = $category->name;
        return $this->adminView('pages.business.content.index', compact('contents', 'category_id','parent_category_id','category_name'));
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

    public function deleteContentsImages($category_id){
        $contents = BusinessContent::where('category_id',$category_id)->get();
        foreach ($contents as $content){
            $this->fileService->remove($content->image_path);
        }
    }

    public function deleteChildCategories($category_id){


        $categories= BusinessCategory::where('parent_category_id',$category_id)->get();
        foreach ($categories as $category){
            $contents = BusinessContent::where('category_id',$category->id)->get();

            foreach ($contents as $content){
                $this->fileService->remove($content->image_path);

            }
            $category->contents()->delete();
            $category->delete();
        }



    }
}

