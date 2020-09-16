<?php


namespace App\Http\Controllers\Web\V1\Front;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Content\AboutUs;
use App\Models\Entities\Content\GuideCategory;
use App\Models\Entities\Content\Prominent\ProminentArea;
use App\Models\Entities\Content\Prominent\ProminentDirection;
use App\Models\Entities\Content\Prominent\ProminentUser;
use App\Models\Entities\Content\Prominent\ProminentUserDirection;
use App\Models\Entities\Content\TeenagerGroup;
use App\Models\Entities\Content\News;
use App\Models\Entities\Content\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends WebBaseController
{
    public function index()
    {
        $about_us = AboutUs::all();
        $slider = Slider::all();
        $news = News::orderBy('created_at', 'desc')->take(4)->get();

        return $this->frontView('pages.index', compact('about_us', 'slider','news'));
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
        $user = ProminentUser::where('id', $id)->with('directions.direction', 'area')->first();
        return $this->frontView('pages.prominent-detail', compact('user'));
    }


    public function prominent(Request $request)
    {
        $minAge = null;
        $maxAge = null;
        $selectedSex = null;
        $selectedArea = null;
        $selectedDirections = null;

        $users_query = ProminentUser::with('area');
        if($request->directions) {
            $selectedDirections = explode(',', $request->directions);
            $ids = ProminentUserDirection::whereIn('direction_id', $selectedDirections)
                ->groupBy('prominent_user_id')
                ->distinct()
                ->pluck('prominent_user_id');
            $users_query = $users_query->whereIn('id', $ids);
        }
        if($request->sex) {
            $selectedSex = $request->sex;
            $users_query = $users_query->where('sex', $selectedSex);
        }
        if($request->area) {
            $selectedArea = $request->area;
            $users_query = $users_query->where('area_id', $selectedArea);
        }
        if($request->minAge || $request->maxAge) {
            if ($request->minAge) $minAge = $request->minAge;
            if ($request->maxAge) $maxAge = $request->maxAge;
            $minDate = Carbon::today()->subYears($minAge);
            $maxDate = Carbon::today()->subYears($maxAge)->endOfDay();
            if ($request->minAge && $request->maxAge) {
                $users_query = $users_query->whereBetween('birth_date', [$maxDate, $minDate]);
            } else if ($request->minAge && !$request->maxAge) {
                $users_query = $users_query->whereDate('birth_date', '<=', $minDate);
            } else if (!$request->minAge && $request->maxAge) {
                $users_query = $users_query->whereDate('birth_date', '>=', $maxDate);
            }
        }

        $users = $users_query
            ->with('directions.direction')
            ->orderBy('prominent_users.updated_at', 'desc')
            ->paginate(10)
            ->appends(request()->query());
        $directions = ProminentDirection::all();
        $areas = ProminentArea::all();
        return $this->frontView('pages.prominent', compact('users', 'areas',
            'directions', 'selectedArea', 'selectedSex', 'maxAge', 'minAge', 'selectedDirections'));
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
