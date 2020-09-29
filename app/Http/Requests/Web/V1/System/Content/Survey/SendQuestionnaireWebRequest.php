<?php


namespace App\Http\Requests\Web\V1\System\Content\Survey;


use App\Http\Requests\Web\WebBaseRequest;

class SendQuestionnaireWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
//            'question_type_id' => ['required','numeric'],
//            'options' => ['required','array'],
//            'new_options' => ['array']
//            'survey_id' => ['required', 'numeric']
        ];
    }
}
