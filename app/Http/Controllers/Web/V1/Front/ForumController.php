<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Requests\Web\V1\System\Content\Survey\SendQuestionnaireWebRequest;
use App\Models\Entities\Content\Survey\Question;
use App\Models\Entities\Content\Survey\QuestionOption;
use App\Models\Entities\Content\Survey\Survey;
use App\Models\Entities\Content\Survey\SurveyResult;
use App\Models\Entities\Content\Survey\SurveyResultAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $survey_id = $id;
        return $this->frontView('pages.forum.questionnaire', compact('questions', 'survey_id'));
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

    public function questionnairePost(SendQuestionnaireWebRequest $request){
        try {

            $open_answers = json_decode($request->optional);
            $options = json_decode($request->options);

            $survey = Survey::find($request->survey_id);

            if(!$survey){
            throw new WebServiceExplainedException('Не найдено!');
        }
        DB::beginTransaction();
        $result = SurveyResult::create([
            'survey_id' => $survey->id
        ]);
        $now = Carbon::now();
       $answers = array();
       $answers2 = array();
        foreach ( $options as $option_id) {
            $option = QuestionOption::find($option_id);
            if (!$option){
                throw new WebServiceExplainedException('Не найдено!');
            }

            $answers[] = [
                'question_id' => $option->question_id,
                'question_option_id' => $option->id,
                'survey_result_id' => $result->id,
                'created_at' => $now,
                'updated_at' => $now
            ];
        }

        foreach ( $open_answers as $open_answer){
            $question = QuestionOption::find($open_answer->id);
            if (!$question){
                throw new WebServiceExplainedException('Не найдено!');
            }
            $answers2[] = [
                'question_id' => $question->id,
                'survey_result_id' => $result->id,
                'text' => $open_answer->value,
                'created_at' => $now,
                'updated_at' => $now
            ];
        }
        SurveyResultAnswer::insert($answers);
        SurveyResultAnswer::insert($answers2);
        DB::commit();
        $message = 'Саулнама сәтті жіберілді!';

        return route('success',compact('message'));
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new WebServiceExplainedException($exception->getMessage());

        }
    }



}
