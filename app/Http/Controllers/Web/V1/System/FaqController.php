<?php

namespace App\Http\Controllers\Web\V1\System;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\Faq\FaqCategoryWebForm;
use App\Http\Forms\Web\V1\System\Content\Faq\FaqWebForm;
use App\Http\Requests\Web\V1\System\Content\Faq\FaqCategoryWebRequest;
use App\Http\Requests\Web\V1\System\Content\Faq\FaqWebRequest;
use App\Models\Entities\Content\Faq\Faq;
use App\Models\Entities\Content\Faq\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends WebBaseController
{
    public function index()
    {
        $categories = FaqCategory::orderBy('updated_at', 'desc')->paginate(10);
        $category_web_form = FaqCategoryWebForm::inputGroups(null);
        return $this->adminView('pages.faq.index', compact('categories', 'category_web_form'));
    }

    public function store(FaqCategoryWebRequest $request)
    {
        FaqCategory::create([
            'name' => $request->name,
        ]);
        $this->added();
        return redirect()->route('faq.index');
    }

    public function update($id, faqCategoryWebRequest $request)
    {
        $category = $this->checkCategoryId($id);
        $category->name = $request->name;
        $category->save();
        $this->edited();
        return redirect()->route('faq.index');
    }

    public function delete($id) {
        $category = $this->checkCategoryId($id);
        $category->questions()->delete();
        $category->delete();
        $this->deleted();
        return redirect()->route('faq.index');
    }

    public function question($category_id)
    {
        $questions = Faq::where('category_id', $category_id)->orderBy('updated_at', 'desc')->paginate(10);
        return $this->adminView('pages.faq.questions.index', compact('questions', 'category_id'));
    }

    public function questionCreate($category_id)
    {
        $question_web_form = FaqWebForm::inputGroups(null);
        return $this->adminView('pages.faq.questions.create', compact('category_id', 'question_web_form'));
    }

    public function questionStore($category_id, FaqWebRequest $request)
    {
        $this->checkCategoryId($category_id);
        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'category_id' => $category_id
        ]);
        $this->added();
        return redirect()->route('faq.question.index', ['category_id' => $category_id]);

    }

    public function questionEdit($id) {
        $question = $this->checkQuestionId($id);
        $category_id = $question->category_id;
        $question_web_form = FaqWebForm::inputGroups($question);
        return $this->adminView('pages.faq.questions.edit', compact('category_id', 'question_web_form', 'question'));
    }

    public function questionUpdate($id, FaqWebRequest $request) {
        $question = $this->checkQuestionId($id);
        $question->question = $request->question;
        $question->answer = $request->answer;
        $question->save();
        $this->edited();
        return redirect()->route('faq.question.index', ['category_id' => $question->category_id]);
    }

    public function questionDelete($id) {
        $question = $this->checkQuestionId($id);
        $question->delete();
        $this->deleted();
        return redirect()->route('faq.question.index', ['category_id' => $question->category_id]);
    }

    private function checkQuestionId($id) {
        $question = Faq::find($id);
        if (!$question) throw new WebServiceExplainedException('Вопрос не найден!');
        return $question;
    }
    private function checkCategoryId($id) {
        $category = FaqCategory::find($id);
        if (!$category) throw new WebServiceExplainedException('Категория не найдена!');
        return $category;
    }
}
