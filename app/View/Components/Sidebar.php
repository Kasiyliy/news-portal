<?php

namespace App\View\Components;

use App\View\BaseComponent;
use Illuminate\Support\Facades\Route;

class Sidebar extends BaseComponent
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return $this->coreView('parts.sidebar');
    }

    public function navList()
    {
        if ($this->user->isAdmin()) {
            return [
                $this->navItem(route('home'), 'ti-home', 'Главная'),
                $this->navItem(route('welcome'), 'ti-arrow-left', 'Вебсайт'),
            ];
        } else {
            return [];
        }
    }

    private function navItem($url, $icon, $name, $items = [])
    {
        return [
            'url' => $url,
            'icon' => $icon,
            'title' => $name,
            'items' => $items,
            'current' => request()->getUri() == $url
        ];
    }

    private function divider()
    {
        return [
            'divider' => true
        ];
    }
}
