<?php

namespace App\View\Components\Admin;
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
        return $this->coreAdminView('parts.sidebar');
    }

    public function navList()
    {
        if ($this->user->isAdmin()) {
            return [
                $this->navItem(route('home'), 'ti-home', 'Главная'),
                $this->navItem(route('welcome'), 'ti-arrow-left', 'Вебсайт'),
                $this->navItem(route('about_us.index'), 'ti-info-alt', 'Про нас'),
                $this->navItem(route('guide.index'), 'ti-help-alt', 'Гид'),
                $this->navItem(route('news.index'), 'ti-bookmark-alt', 'Новости'),
                $this->navItem(route('slider.index'), 'ti-layout-media-right-alt', 'Слайдер'),
                $this->navItem(route('prominent.area.index'), 'ti-location-arrow', 'Районы'),
                $this->navItem(route('prominent.direction.index'), 'ti-direction-alt', 'Направления'),
                $this->navItem(route('prominent.user.index'), 'ti-user', 'Люди'),
                $this->navItem(route('about_project.index'), 'ti-clipboard', 'О проекте')

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
