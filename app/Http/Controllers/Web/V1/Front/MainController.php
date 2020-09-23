<?php


namespace App\Http\Controllers\Web\V1\Front;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Requests\Web\V1\System\Content\UserSendEventWebRequest;
use App\Models\Entities\Content\AboutProject;
use App\Models\Entities\Content\AboutUs;
use App\Models\Entities\Content\Business\BusinessCategory;
use App\Models\Entities\Content\Business\BusinessContent;
use App\Models\Entities\Content\Event;
use App\Models\Entities\Content\EventImage;
use App\Models\Entities\Content\GuideCategory;
use App\Models\Entities\Content\Prominent\ProminentArea;
use App\Models\Entities\Content\Prominent\ProminentDirection;
use App\Models\Entities\Content\Prominent\ProminentUser;
use App\Models\Entities\Content\Prominent\ProminentUserDirection;
use App\Models\Entities\Content\TeenagerGroup;
use App\Models\Entities\Content\News;
use App\Models\Entities\Content\Slider;
use Carbon\Carbon;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends WebBaseController
{
    public function index()
    {
        $about_us = AboutUs::all();
        $slider = Slider::all();
        $news = News::orderBy('created_at', 'desc')->take(4)->get();
        $business_categories = BusinessCategory::where('parent_category_id', null)->has('childCategories')
            ->orderBy('created_at', 'desc')->get();
        return $this->frontView('pages.index', compact('about_us', 'slider', 'news', 'business_categories'));
    }

    public function success() {
        return $this->frontView('pages.success');
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


    public function resource()
    {
        return $this->frontView('pages.resource');
    }

    public function about()
    {
        $about_project = AboutProject::first();
        return $this->frontView('pages.about', compact('about_project'));
    }

}
