<?php


namespace App\Http\Controllers\Web\V1\System\Survey;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\Survey\SurveyWebForm;
use App\Http\Requests\Web\V1\System\Content\Business\BusinessCategoryWebRequest;
use App\Http\Requests\Web\V1\System\Content\Survey\SurveyWebRequest;
use App\Models\Entities\Content\Business\BusinessCategory;
use App\Models\Entities\Content\Survey\Survey;

class SurveyController  extends WebBaseController
{


    public function index() {
        $surveys = Survey::paginate(10);
        $survey_web_form = SurveyWebForm::inputGroups(null);
        return $this->adminView('pages.survey.index', compact('surveys','survey_web_form'));
    }

    public function store(SurveyWebRequest $request)
    {

            Survey::create([
                'title' => $request->title,
            ]);
            $this->added();
            return redirect()->route('survey.index');
    }

    public function update($id, SurveyWebRequest $request)
    {

            $survey = Survey::find($id);
            if (!$survey) throw new WebServiceExplainedException('Опрос не найден!');

            $survey->update([
                'title' => $request->title,
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
