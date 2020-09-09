<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 16:29
 */

namespace App\View\Components;

use App\View\BaseComponent;

class Footer extends BaseComponent
{
    public function render()
    {
        return $this->coreView('parts.footer');
    }

    public function navList()
    {
        return [
            $this->navItem(route('welcome'), 'Website')
        ];
    }

    protected function navItem($url, $title)
    {
        return [
            'url' => $url,
            'title' => $title
        ];
    }

}