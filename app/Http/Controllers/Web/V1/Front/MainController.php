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
}
