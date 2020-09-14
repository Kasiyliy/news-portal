<?php


namespace App\Http\Controllers\Web\V1\System;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\NewsWebForm;
use App\Http\Requests\Web\V1\System\Content\NewsWebRequest;
use App\Models\Entities\Content\News;
use Illuminate\Http\UploadedFile;


class NewsController extends WebBaseController
{
    public function index() {
        $news = News::paginate(10);

        return $this->adminView('pages.news.index', compact('news'));
    }


    public function create()
    {
        $news_form = NewsWebForm::inputGroups(null);
        return $this->adminView('pages.news.create', compact( 'news_form'));
    }

    public function store(NewsWebRequest $request) {

        dd($request->file('file')->getClientMimeType());
        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'viewed_count' =>0,
            'image_path' => "imgpath"
        ]);
        $this->added();
        return redirect()->route('news.index');
    }

    public function edit($id) {
        $news = News::find($id);
        if(!$news) throw new WebServiceExplainedException('Новость не найдена!');
        $news_form = NewsWebForm::inputGroups($news);
        return $this->adminView('pages.news.edit', compact( 'news_form', 'news'));
    }

    public function update($id, NewsWebRequest $request) {
        $news = News::find($id);
        if(!$news) throw new WebServiceExplainedException('Новость не найдена!');
        $news->title = $request->title;
        $news->description = $request->description;
        $news->save();
        $this->edited();
        return redirect()->route('news.index');
    }


    public function delete($id) {
        $content = News::find($id);
        if (!$content) throw new WebServiceExplainedException('Новость не найдена!');
        $content->delete();
        $this->deleted();
        return redirect()->route('news.index');
    }
}
