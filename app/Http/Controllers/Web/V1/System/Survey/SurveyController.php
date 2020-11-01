<?php


namespace App\Http\Controllers\Web\V1\System\Survey;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\Survey\SurveyWebForm;
use App\Http\Requests\Web\V1\System\Content\Business\BusinessCategoryWebRequest;
use App\Http\Requests\Web\V1\System\Content\Survey\SurveyWebRequest;
use App\Models\Entities\Content\Business\BusinessCategory;
use App\Models\Entities\Content\Survey\Survey;
use App\Services\Common\V1\Support\FileService;

class SurveyController extends WebBaseController
{

    protected $fileService;

    /**
     * SurveyController constructor.
     * @param $fileService
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }


    public function index()
    {
        $surveys = Survey::paginate(10);
        $survey_web_form = SurveyWebForm::inputGroups(null);
        return $this->adminView('pages.survey.index', compact('surveys', 'survey_web_form'));
    }

    public function store(SurveyWebRequest $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->fileService->store($request->file('image'), Survey::DEFAULT_RESOURCE_DIRECTORY);
        }
        Survey::create([
            'title' => $request->title,
            'image_path' => $imagePath
        ]);
        $this->added();
        return redirect()->route('survey.index');
    }

    public function update($id, SurveyWebRequest $request)
    {

        $survey = Survey::find($id);
        if (!$survey) throw new WebServiceExplainedException('Опрос не найден!');

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->fileService
                ->updateWithRemoveOrStore(
                    $request->file('image'),
                    Survey::DEFAULT_RESOURCE_DIRECTORY,
                    $survey->image_path);
        }
        $survey->update([
            'title' => $request->title,
            'image_path' => $imagePath
        ]);
        $this->edited();
        return redirect()->route('survey.index');

    }

    public function changeVisibility($id)
    {
        $survey = Survey::findOrFail($id);
        if (!$survey) {
            throw new WebServiceExplainedException('Опрос не найден!');
        }
        if ($survey->is_visible) $survey->is_visible = false;
        else $survey->is_visible = true;
        $survey->save();
        $this->edited();
        return redirect()->route('survey.index');
    }
}
