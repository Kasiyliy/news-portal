<?php


namespace App\Http\Requests\Web\V1\System\Content\Forum;


use App\Http\Requests\Web\WebBaseRequest;

class SendMessageForumWebRequest extends WebBaseRequest
{
    public function injectedRules(): array
    {
        return [
//            'text' => ['required', 'string'],
        ];
    }
}
