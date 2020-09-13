<?php

namespace App\Http\Controllers\Web\V1\System;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\GuiderCategoryWebForm;
use App\Http\Requests\Web\V1\System\Content\GuideCategoryWebRequest;
use App\Models\Entities\Content\GuideCategory;
use App\Models\Entities\Content\GuideContent;
use Illuminate\Http\Request;

class GuideController extends WebBaseController
{
    public function index() {
        $categories = GuideCategory::paginate(10);
        $category_web_form = GuiderCategoryWebForm::inputGroups(null);
        return $this->adminView('pages.guide.index', compact('categories', 'category_web_form'));
    }

    public function store(GuideCategoryWebRequest $request) {
        GuideCategory::create([
           'name' => $request->name,
        ]);
        $this->added();
        return redirect()->route('guide.index');
    }

    public function update($id, GuideCategoryWebRequest $request) {
        $category = GuideCategory::find($id);
        if(!$category) throw new WebServiceExplainedException('Категория не найдена!');
        $category->name = $request->name;
        $category->save();
        $this->edited();
        return redirect()->route('guide.index');
    }

    public function content($category_id) {
        $contents = GuideContent::where('category_id', $category_id)->paginate(1);
        return $this->adminView('pages.guide.content.index', compact('contents', 'category_id'));
    }

    public function contentCreate($category_id) {

        return $this->adminView('pages.guide.content.create', compact('category_id'));
    }
}
