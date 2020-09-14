<?php


namespace App\Http\Controllers\Web\V1\Front;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Content\AboutUs;
use App\Models\Entities\Content\GuideCategory;
use App\Models\Entities\Content\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends WebBaseController
{
    public function index()
    {
        $about_us = AboutUs::all();
        return $this->frontView('pages.index', compact('about_us'));
    }

    public function news()
    {
        $last_news = News::where('created_at', ">", DB::raw('NOW() - INTERVAL 1 WEEK'))->get();
        $count = 0;
        $news = News::paginate(6);

        return $this->frontView('pages.news',compact('news','last_news' , 'count'));
    }

    public function newsDetail($id)
    {
        return $this->frontView('pages.news-detail');
    }

    public function groups()
    {
        return $this->frontView('pages.groups');
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
