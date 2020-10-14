<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Requests\Web\V1\System\Content\Forum\SendMessageForumWebRequest;
use App\Http\Requests\Web\V1\System\Content\Forum\SendTopicForumWebRequest;
use App\Http\Requests\Web\V1\System\Content\Survey\SendQuestionnaireWebRequest;
use App\Models\Entities\Content\Forum\ForumCategory;
use App\Models\Entities\Content\Forum\ForumMessage;
use App\Models\Entities\Content\Forum\ForumTopic;
use App\Models\Entities\Content\Forum\MessageLike;
use App\Models\Entities\Content\Survey\Question;
use App\Models\Entities\Content\Survey\QuestionOption;
use App\Models\Entities\Content\Survey\Survey;
use App\Models\Entities\Content\Survey\SurveyResult;
use App\Models\Entities\Content\Survey\SurveyResultAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            throw new WebServiceExplainedException('Контент табылған жоқ!');
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

    public function categories()
    {
        $categories = ForumCategory::where('parent_category_id', null)->with(['childCategories'])->get();
        return $this->frontView('pages.forum.categories', compact('categories'));
    }

    public function categoryList($id)
    {
        if(!$id){
            throw new WebServiceExplainedException('Контент табылған жоқ!');
        }
        $category_title = ForumCategory::where('id', $id)->first();
        $subcategories = ForumCategory::where('parent_category_id', $id)->get();
        return $this->frontView('pages.forum.category-list', compact('category_title', 'subcategories'));
    }

    public function categoryDetail($id)
    {
        if(!$id){
            throw new WebServiceExplainedException('Контент табылған жоқ!');
        }
        $subcategory = ForumCategory::where('id', $id)->first();
        $topics = ForumTopic::where('forum_category_id', $id)->with(['author'])->with(['messages'])->get();
        return $this->frontView('pages.forum.category-detail', compact('topics', 'subcategory'));
    }

    public function categoryDetailPost(SendTopicForumWebRequest $request)
    {
        $user_id = Auth::id();
        $forum_category_id = $request->route('id');
        if(!$forum_category_id){
            throw new WebServiceExplainedException('Контент табылған жоқ!');
        }
        if (!$user_id) {
            throw new WebServiceExplainedException('Пользователь не найден!');
        }
        try {
            DB::beginTransaction();
            ForumTopic::create([
                'title' => $request->title,
                'forum_category_id' => $forum_category_id,
                'user_id' => $user_id
            ]);
            $this->added();
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function categoryMessages($id){
        if(!$id){
            throw new WebServiceExplainedException('Контент табылған жоқ!');
        }
        $topic = ForumTopic::where('id', $id)->with(['author'])->with(['messages','category'])->first();
        $messages = ForumMessage::orderBy('created_at', 'asc')->where('forum_topic_id', $id)->with(['author','likes','dislikes'])->paginate(10);

        return $this->frontView('pages.forum.messages', compact('topic', 'messages'));
    }

    public function categoryMessagesPost(SendMessageForumWebRequest $request)
    {
        $user_id = Auth::id();
        $forum_topic_id = $request->route('id');
        if(!$forum_topic_id){
            throw new WebServiceExplainedException('Контент табылған жоқ!');
        }
        if (!$user_id) {
            throw new WebServiceExplainedException('Пользователь не найден!');
        }
        try {
            DB::beginTransaction();
            ForumMessage::create([
                'text' => $request->text,
                'forum_topic_id' => $forum_topic_id,
                'user_id' => $user_id
            ]);
            $this->added();
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }


    public function questionnairePost(SendQuestionnaireWebRequest $request)
    {
        try {

            $open_answers = json_decode($request->optional);
            $options = json_decode($request->options);

            $survey = Survey::find($request->survey_id);

            if(!$survey){
            throw new WebServiceExplainedException('Контент табылған жоқ!');
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
                throw new WebServiceExplainedException('Контент табылған жоқ!');
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
                throw new WebServiceExplainedException('Контент табылған жоқ!');
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

            return route('success', compact('message'));
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new WebServiceExplainedException($exception->getMessage());

        }
    }


    public function messageLike( Request $request){

        $message = ForumMessage::find($request->message_id);
        if(!$message){
            throw new WebServiceExplainedException('Контент табылған жоқ!');
        }


        $userLike = MessageLike::where('forum_message_id',$message->id)->where('user_id',Auth::id())->first();

        if(!$userLike){

            MessageLike::create([
                'user_id' => Auth::id(),
                'forum_message_id' => $message->id,
                'liked' => $request->liked
            ]);
        }else{

            $userLike->update([
                'liked'=>$request->liked
            ]);

        }
        $message = ForumMessage::where('id',$request->message_id)->with(['likes','dislikes'])->get();


        return $message;
    }



}
