<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use Illuminate\Http\Request;

class ForumController extends WebBaseController
{

    public function forumAndQuestionnaire()
    {
        return $this->frontView('pages.forum-questionnaire');
    }
}
