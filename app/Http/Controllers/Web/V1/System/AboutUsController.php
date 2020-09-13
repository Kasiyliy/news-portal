<?php

namespace App\Http\Controllers\Web\V1\System;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\AboutUsWebForm;
use App\Http\Requests\Web\V1\System\Content\AboutUsWebRequest;
use App\Models\Entities\Content\AboutUs;

class AboutUsController extends WebBaseController
{
    public function index() {
        $about_us = AboutUs::all();
        $about_us_form = AboutUsWebForm::inputGroups($about_us);
        return $this->adminView('pages.about-us.index', compact('about_us', 'about_us_form'));
    }

    public function update(AboutUsWebRequest $request) {
        $about_us = AboutUs::all();
        foreach ($about_us as $count) {
            switch ($count->type) {
                case AboutUs::TEENAGERS_COUNT: {
                    $count->count = $request->teenagers_count;
                    break;
                }
                case AboutUs::APPLICATIONS_COUNT: {
                    $count->count = $request->applications_count;
                    break;
                }
                case AboutUs::VOLUNTEERS_COUNT: {
                    $count->count = $request->volunteers_count;
                    break;
                }
                case AboutUs::RESOURCES_CENTER_COUNT: {
                    $count->count = $request->resources_center_count;
                    break;
                }
            }
            $count->save();
        }
        $this->edited();
        return redirect()->route('about_us.index');
    }
}
