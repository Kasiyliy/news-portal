<?php


namespace App\Http\Controllers\Web\V1\Front;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Content\AboutUs;
use App\Models\Entities\Content\GuideCategory;
use App\Models\Entities\Content\TeenagerGroup;
use Illuminate\Http\Request;

class MainController extends WebBaseController
{
    public function index()
    {
        $about_us = AboutUs::all();
        return $this->frontView('pages.index', compact('about_us'));
    }

    public function news()
    {
        return $this->frontView('pages.news');
    }

    public function newsDetail($id)
    {
        return $this->frontView('pages.news-detail');
    }

    public function groups()
    {
        $groups = TeenagerGroup::orderBy('updated_at', 'desc')->get();
        return $this->frontView('pages.groups', compact('groups'));
    }

    public function guide(Request $request)
    {
        $categories = GuideCategory::with('contents')->get();
        $i = 0;
        $currentCategory = $categories->first();
        if ($request->category_id) {
            $currentCategory = $categories->where('id', $request->category_id)->first();
            if (!$currentCategory) throw new WebServiceExplainedException('Не найдено!');
        }
        return $this->frontView('pages.guide', compact('categories', 'i', 'currentCategory'));
    }

    public function business()
    {
        return $this->frontView('pages.business');
    }

    public function prominentDetail($id)
    {
        return $this->frontView('pages.prominent-detail');
    }

    public function prominent()
    {
        return $this->frontView('pages.prominent');
    }

    public function resource()
    {
        return $this->frontView('pages.resource');
    }

    public function about()
    {
        return $this->frontView('pages.about');
    }
}
