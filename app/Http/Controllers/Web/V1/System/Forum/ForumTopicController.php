<?php


namespace App\Http\Controllers\Web\V1\System\Forum;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Content\Forum\ForumCategory;
use App\Models\Entities\Content\Forum\ForumMessage;
use App\Models\Entities\Content\Forum\ForumTopic;

class ForumTopicController extends WebBaseController
{

    public function index($category_id){
        $category = ForumCategory::find($category_id);
        if (!$category) throw new WebServiceExplainedException('Категория не найдена!');

        $topics = ForumTopic::where('forum_category_id',$category_id)->with('author')->orderBy('updated_at', 'desc')->paginate(10);

        return $this->adminView('pages.forum.topics.index', compact('category_id','topics','category'));
    }


    public function delete($id){
        $topic = ForumTopic::find($id);
        if (!$topic) throw new WebServiceExplainedException(' Тема не найдена!');

        $category_id = $topic->forum_category_id;
        $topic->delete();
        $this->deleted();
        return redirect()->route('forum.category.index',['category_id'=>$category_id]);
    }

    public function message($topic_id){
        $topic = ForumTopic::find($topic_id);
        if (!$topic) throw new WebServiceExplainedException(' Тема не найдена!');
        $messages = ForumMessage::where('forum_topic_id',$topic->id)->with('author')->orderBy('updated_at', 'asc')->paginate(10);
        return $this->adminView('pages.forum.topics.message', compact('messages','topic'));

    }

    public function messageDelete($id){
        $message = ForumMessage::find($id);
        if (!$message) throw new WebServiceExplainedException(' Сообщение не найдено!');
        $topic_id = $message->forum_topic_id;
        $message->delete();
        $this->deleted();
        return redirect()->route('forum.message.index',['topic_id'=>$topic_id]);

    }
}
