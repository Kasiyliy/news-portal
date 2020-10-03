<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 3.10.2020
 * Time: 17:09
 */

namespace App\Http\Requests\Web\V1\System\Content\Map;


use App\Http\Requests\Web\WebBaseRequest;

class StoreAndUpdateMapWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'region' => ['required', 'string'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'boss' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phones' => ['required', 'string'],
            'address' => ['required', 'string'],
            'instagram' => ['string'],
            'facebook' => ['string'],
            'vk' => ['string'],
            'youtube' => ['string'],
            'twitter' => ['string'],
        ];
    }

}