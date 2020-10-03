<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Content\Business\BusinessCategory;
use App\Models\Entities\Content\Business\BusinessContent;
use Illuminate\Http\Request;

class BusinessController extends WebBaseController
{
    public function business($id, Request $request)
    {
        $parent_category = BusinessCategory::where('id', $id)->where('parent_category_id', null)->first();
        if(!$parent_category) throw new WebServiceExplainedException('Не найдено!');

        $categories = BusinessCategory::where('parent_category_id', $parent_category->id)->orderBy('updated_at', 'desc')->get();
        if($categories->isEmpty()) throw new WebServiceExplainedException('Контент табылған жоқ!');
        $currentCategory = $categories->first();

        if ($request->category_id) {
            $currentCategory = $categories->where('id', $request->category_id)->first();
            if (!$currentCategory) throw new WebServiceExplainedException('Контент табылған жоқ!');
        }

        $contents = $currentCategory->contents()->paginate(6);


        return $this->frontView('pages.business.business', compact('categories', 'currentCategory', 'contents', 'parent_category'));
    }

    public function businessDetail($id)
    {
        $business_content = BusinessContent::where('id', $id)->with('category')->first();
        if (!$business_content) {
            throw new WebServiceExplainedException('Контент табылған жоқ!');
        }
        $parent_category_id = $business_content->category->parent_category_id;
        return $this->frontView('pages.business.business-detail', compact('business_content', 'parent_category_id'));
    }
}
