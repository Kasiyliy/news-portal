<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 29.10.2020
 * Time: 18:20
 */

namespace App\Http\Requests\Web\V1\System\Content;


use App\Http\Requests\Web\WebBaseRequest;

class MobileLinkStoreOrUpdateWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'title' => ['required', 'string'],
            'link' => ['required', 'string'],
        ];
    }

}