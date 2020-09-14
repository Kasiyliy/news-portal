<?php


namespace App\Http\Controllers\Web\V1\Front;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Content\AboutUs;
use App\Models\Entities\Content\GuideCategory;
use App\Models\Entities\Content\TeenagerGroup;
use App\Models\Entities\Content\News;
use App\Models\Entities\Content\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends WebBaseController
{
    public function index()
    {
        $about_us = AboutUs::all();
        $slider = Slider::all();
        return $this->frontView('pages.index', compact('about_us', 'slider'));
    }

    public function news()
    {
        $last_news = News::orderBy('created_at', 'desc')->take(7)->get();
        $count = 0;
        $most_viewed = News::orderBy('viewed_count', 'desc')->take(3)->get();
        $news = News::paginate(6);

        return $this->frontView('pages.news',compact('news','last_news' , 'count','most_viewed'));
    }

    public function newsDetail($id)
    {
        $news = News::where('id',$id)->first();
        $news->update(['viewed_count' => $news->viewed_count+1]);
        return $this->frontView('pages.news-detail',compact('news'));
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
