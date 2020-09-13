<?php

namespace App\Http\Controllers\Web\V1\System;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\GuideContentWebForm;
use App\Http\Forms\Web\V1\System\Content\GuiderCategoryWebForm;
use App\Http\Requests\Web\V1\System\Content\GuideCategoryWebRequest;
use App\Http\Requests\Web\V1\System\Content\GuideContentWebRequest;
use App\Models\Entities\Content\GuideCategory;
use App\Models\Entities\Content\GuideContent;
use Illuminate\Http\Request;

class GuideController extends WebBaseController
{
    public function index()
    {
        $categories = GuideCategory::orderBy('updated_at', 'desc')->paginate(10);
        $category_web_form = GuiderCategoryWebForm::inputGroups(null);
        return $this->adminView('pages.guide.index', compact('categories', 'category_web_form'));
    }

    public function store(GuideCategoryWebRequest $request)
    {
        GuideCategory::create([
            'name' => $request->name,
        ]);
        $this->added();
        return redirect()->route('guide.index');
    }

    public function update($id, GuideCategoryWebRequest $request)
    {
        $category = GuideCategory::find($id);
        if (!$category) throw new WebServiceExplainedException('Категория не найдена!');
        $category->name = $request->name;
        $category->save();
        $this->edited();
        return redirect()->route('guide.index');
    }

    public function delete($id) {
        $category = GuideCategory::find($id);
        if (!$category) throw new WebServiceExplainedException('Категория не найдена!');
        $category->contents()->delete();
        $category->delete();
        $this->deleted();
        return redirect()->route('guide.index');

    }

    public function content($category_id)
    {
        $contents = GuideContent::where('category_id', $category_id)->orderBy('updated_at', 'desc')->paginate(10);
        return $this->adminView('pages.guide.content.index', compact('contents', 'category_id'));
    }

    public function contentCreate($category_id)
    {
        $content_web_form = GuideContentWebForm::inputGroups(null);
        return $this->adminView('pages.guide.content.create', compact('category_id', 'content_web_form'));
    }

    public function contentStore($category_id, GuideContentWebRequest $request)
    {
        $category = GuideCategory::find($category_id);
        if (!$category) throw new WebServiceExplainedException('Категория не найдена!');
        GuideContent::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $category_id
        ]);
        $this->added();
        return redirect()->route('guide.content.index', ['category_id' => $category_id]);

    }

    public function contentEdit($id) {
        $content = GuideContent::find($id);
        if (!$content) throw new WebServiceExplainedException('Контент не найден!');
        $category_id = $content->category_id;
        $content_web_form = GuideContentWebForm::inputGroups($content);
        return $this->adminView('pages.guide.content.edit', compact('category_id', 'content_web_form', 'content'));
    }

    public function contentUpdate($id, GuideContentWebRequest $request) {
        $content = GuideContent::find($id);
        if (!$content) throw new WebServiceExplainedException('Контент не найден!');
        $content->title = $request->title;
        $content->description = $request->description;
        $content->save();
        $this->edited();
        return redirect()->route('guide.content.index', ['category_id' => $content->category_id]);
    }

    public function contentDelete($id) {
        $content = GuideContent::find($id);
        if (!$content) throw new WebServiceExplainedException('Контент не найден!');
        $content->delete();
        $this->deleted();
        return redirect()->route('guide.content.index', ['category_id' => $content->category_id]);
    }
}
