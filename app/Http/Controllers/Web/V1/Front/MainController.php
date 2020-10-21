<?php


namespace App\Http\Controllers\Web\V1\Front;


use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Content\AboutProject;
use App\Models\Entities\Content\AboutUs;
use App\Models\Entities\Content\Business\BusinessCategory;
use App\Models\Entities\Content\GovernmentProgram;
use App\Models\Entities\Content\Map\MapRegion;
use App\Models\Entities\Content\News;
use App\Models\Entities\Content\Slider;
use App\Models\Entities\Content\TeenagerGroup;
use Illuminate\Http\Request;

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

    public function success(Request $request)
    {

        $message = $request->message;
        return $this->frontView('pages.success', compact('message'));
    }

    public function groups()
    {
        $groups = TeenagerGroup::orderBy('updated_at', 'desc')->get();
        return $this->frontView('pages.groups', compact('groups'));
    }

    public function programs()
    {
        $programs = GovernmentProgram::orderBy('updated_at', 'desc')->get();
        return $this->frontView('pages.programs', compact('programs'));
    }


    public function resource($id = null)
    {
        $mapRegion = $id ? MapRegion::findOrFail($id) : MapRegion::findOrFail(1);
        $regions = MapRegion::all();
        return $this->frontView('pages.resource', compact('mapRegion', 'regions'));
    }

    public function about()
    {
        $about_project = AboutProject::first();
        return $this->frontView('pages.about', compact('about_project'));
    }

}
