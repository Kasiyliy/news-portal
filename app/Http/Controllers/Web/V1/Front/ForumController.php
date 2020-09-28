<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Content\Survey\Question;
use App\Models\Entities\Content\Survey\QuestionOption;
use App\Models\Entities\Content\Survey\Survey;
use Illuminate\Http\Request;

class ForumController extends WebBaseController
{

    public function forumAndQuestionnaire()
    {
        return $this->frontView('pages.forum.forum-questionnaire');
    }

    public function questionnaire($id)
    {
        $survey = Survey::where('id', $id)->first();
        if (!$survey->id) {
            throw new WebServiceExplainedException('Не найдено!');
        }
        $questions = Question::where('survey_id', $survey->id)->with(['options'])->with('type')->get();
        return $this->frontView('pages.forum.questionnaire', compact('questions'));
    }
    public function questionnaireList()
    {
        $survey = Survey::where('is_visible', 1)->get();
        return $this->frontView('pages.forum.questionnaire-list', compact('survey'));
    }

    public function categories(Request $request)
    {
        return $this->frontView('pages.forum.categories');
    }

    public function categoryDetail($id)
    {
        return $this->frontView('pages.forum.category-detail');
    }
}
