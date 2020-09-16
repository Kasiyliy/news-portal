<?php


namespace App\Http\Controllers\Web\V1\System;


use App\Core\Utils\FileUtil;
use App\Exceptions\Web\WebServiceException;
use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\NewsWebForm;
use App\Http\Requests\Web\V1\System\Content\NewsWebRequest;
use App\Models\Entities\Content\News;
use App\Services\Common\V1\Support\FileService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;


class NewsController extends WebBaseController
{
    protected $fileService;

     function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }


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
    try {
        $path = null;
        DB::beginTransaction();
        if ($request->file('file')) {
            $path = $this->fileService->store($request->file('file'), News::DEFAULT_RESOURCE_DIRECTORY);
        }
        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'viewed_count' => 0,
            'image_path' => $path
        ]);
        $this->added();
        DB::commit();

        return redirect()->route('news.index');
        }catch (\Exception $exception){
        DB::rollBack();
        if($path) $this->fileService->remove($path);
        throw new WebServiceExplainedException($exception->getMessage());
        }
    }

    public function edit($id) {
        $news = News::find($id);
        if(!$news) throw new WebServiceExplainedException('Новость не найдена!');
        $news_form = NewsWebForm::inputGroups($news);
        return $this->adminView('pages.news.edit', compact( 'news_form', 'news'));
    }

    public function update($id, NewsWebRequest $request) {
      try {
          $news = News::find($id);
          if (!$news) throw new WebServiceExplainedException('Новость не найдена!');
          $path = $news->image_path;

          if ($request->file('file')) {
              $path = $this->fileService
                  ->updateWithRemoveOrStore($request->file('file'), News::DEFAULT_RESOURCE_DIRECTORY, $path);
          }
          $news->update([
              'title' => $request->title,
              'description' => $request->description,
              'image_path' => $path
          ]);

          $this->edited();
          return redirect()->route('news.index');
      }catch (\Exception $exception){

          if($path) $this->fileService->remove($path);
          throw new WebServiceExplainedException($exception->getMessage());
      }
    }


    public function delete($id) {
        $news = News::find($id);
        if (!$news) throw new WebServiceExplainedException('Новость не найдена!');
        $this->fileService->remove($news->image_path);
        $news->delete();
        $this->deleted();
        return redirect()->route('news.index');
    }
}
