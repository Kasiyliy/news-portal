<?php


namespace App\Http\Controllers\Web\V1\Front;


use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Content\AboutUs;

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
        return $this->frontView('pages.groups');
    }

    public function guide()
    {
        return $this->frontView('pages.guide');
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
}
