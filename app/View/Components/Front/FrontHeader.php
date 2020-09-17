<?php

namespace App\View\Components\Front;

use App\Models\Entities\Content\AboutProject;
use App\View\BaseComponent;

class FrontHeader extends BaseComponent
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $navItems = [
            [
                'title' => 'Жаңалықтар',
                'href' => route('news')
            ],
            [
                'title' => 'Жоба туралы',
                'href' => route('about')
            ],
            [
                'title' => 'Іс-шара',
                'href' => '#'
            ]
        ];
        $about_project = AboutProject::first();
        return $this->coreFrontView('parts.front-header', compact('navItems', 'about_project'));
    }
}
