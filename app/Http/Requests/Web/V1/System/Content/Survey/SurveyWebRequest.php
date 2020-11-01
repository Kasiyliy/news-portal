<?php


namespace App\Http\Requests\Web\V1\System\Content\Survey;


use App\Http\Requests\Web\WebBaseRequest;

class SurveyWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
            'title' => ['required', 'string'],
            'image' => ['required', 'image'],
        ];
    }
}
