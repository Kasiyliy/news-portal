<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 29.10.2020
 * Time: 18:30
 */

namespace App\Http\Controllers\Api\V1\System;


use App\Http\Controllers\Api\ApiBaseController;
use App\Models\Entities\Content\MobileLink;

class MobileLinkController extends ApiBaseController
{
    public function index(){
        return $this->ok(MobileLink::all());
    }
}