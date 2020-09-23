<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Content\News;
use Illuminate\Http\Request;

class NewsController extends WebBaseController
{
    public function news()
    {
        $last_news = News::orderBy('created_at', 'desc')->take(7)->get();
        $count = 0;
        $most_viewed = News::orderBy('viewed_count', 'desc')->take(3)->get();
        $news = News::orderBy('created_at', 'desc')->paginate(6);


        return $this->frontView('pages.news.news', compact('news', 'last_news', 'count', 'most_viewed'));
    }

    public function newsDetail($id)
    {
        $news = News::where('id', $id)->first();
        if(!$news) throw new WebServiceExplainedException('Не найдено!');

        $news->update(['viewed_count' => $news->viewed_count + 1]);
        return $this->frontView('pages.news.news-detail', compact('news'));
    }
}
