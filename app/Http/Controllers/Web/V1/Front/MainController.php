<?php


namespace App\Http\Controllers\Web\V1\Front;


use App\Http\Controllers\Web\WebBaseController;

class MainController extends WebBaseController
{
    public function index()
    {
        return $this->frontView('pages.index');
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

    public function prominent()
    {
        return $this->frontView('pages.prominent');
    }
}
