<?php


namespace App\Http\Requests\Web\V1\System\Content\Survey;


use App\Http\Requests\Web\WebBaseRequest;

class SendQuestionnaireWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
//            'options' => ['array'],
//            'optional' => ['array'],
//            'survey_id' => ['required']

        ];
    }
}
