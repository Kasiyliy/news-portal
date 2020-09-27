<?php


namespace App\Http\Controllers\Web\V1\System\Survey;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\Survey\QuestionWebForm;
use App\Http\Forms\Web\V1\System\Content\Survey\SurveyWebForm;
use App\Http\Requests\Web\V1\System\Content\Survey\QuestionWebRequest;
use App\Models\Entities\Content\Survey\Question;
use App\Models\Entities\Content\Survey\QuestionOption;
use App\Models\Entities\Content\Survey\Survey;
use Carbon\Carbon;

class QuestionController  extends WebBaseController
{
    public function index($survey_id) {
        $survey = Survey::find($survey_id);
        $questions = Question::where('survey_id',$survey_id)->paginate(10);
        return $this->adminView('pages.survey.question.index', compact('questions','survey'));
    }

    public function create($survey_id)
    {
        $question_web_form = QuestionWebForm::inputGroups(null);
        return $this->adminView('pages.survey.question.create', compact('survey_id', 'question_web_form'));
    }

    public function store($survey_id,QuestionWebRequest $request)
    {
        $need_custom_answer = false;
        $required = false;

            if($request->need_custom_answer){
                $need_custom_answer = true;
            }
        if($request->required){
            $required = true;
        }
            $question = Question::create([
                'title' => $request->title,
                'survey_id' => $survey_id,
                'question_type_id' => $request->question_type_id,
                'need_custom_answer' =>$need_custom_answer,
                'required' => $required
            ]);

            $options = array();
            $now = Carbon::now();
            foreach ($request->options as $option) {
            $options[] = [
                'question_id' => $question->id,
                'text' => $option,
                'created_at' => $now,
                'updated_at' => $now
            ];
                }

            QuestionOption::insert($options);
            $this->added();
            return redirect()->route('survey.question.index', ['survey_id' => $survey_id]);

    }

    public function edit($id)
    {
        $question = Question::with(['options'])->find($id);

        if (!$question) {
            throw new WebServiceExplainedException('Вопрос не найден!');
        }
        $survey_id = $question->survey_id;
        $question_web_form = QuestionWebForm::inputGroups($question);
        return $this->adminView('pages.survey.question.edit', compact('question','question_web_form','survey_id'));

    }


    public function update($id,QuestionWebRequest $request)
    {
        $question = Question::find($id);

        $old_options = $request->options;


        $need_custom_answer = false;
        $required = false;

        if($request->need_custom_answer){
            $need_custom_answer = true;
        }
        if($request->required){
            $required = true;
        }
        $question->update([
            'title' => $request->title,
            'question_type_id' => $request->question_type_id,
            'need_custom_answer' =>$need_custom_answer,
            'required' => $required,
        ]);

        foreach($old_options as $id => $value){
            $option = QuestionOption::find($id);
            $option->update(['text'=>$value]);
        }

        if($request->new_options){
            $now = Carbon::now();
            foreach ($request->new_options as $option) {
                $new_options[] = [
                    'question_id' => $question->id,
                    'text' => $option,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }

            QuestionOption::insert($new_options);
        }

        $this->edited();
        return redirect()->route('survey.question.index', ['survey_id' => $question->survey_id]);

    }


}
