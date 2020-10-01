<?php


namespace App\Http\Requests\Web\V1\System\Content\Forum;


use App\Http\Requests\Web\WebBaseRequest;

class SendTopicForumWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
//            'title' => ['required', 'string'],
        ];
    }
}
