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
                $this->navItem(route('welcome'), 'ti-arrow-left', 'Вебсайт'),
                $this->navItem(route('home'), 'ti-home', 'Главная', [
                    $this->navItem(route('about_us.index'), 'ti-info-alt', 'Про нас'),
                    $this->navItem(route('slider.index'), 'ti-layout-media-right-alt', 'Слайдер'),
                    $this->navItem(route('event.index'), 'ti-calendar', 'Мероприятия'),
                    $this->navItem(route('about_project.index'), 'ti-clipboard', 'О проекте'),
                    $this->navItem(route('map.region.index'), 'ti-map', 'Регионы карты'),
                ]),
                $this->navItem(route('business.index'), 'ti-layers-alt', 'Контент', [
                    $this->navItem(route('programs.index'), 'ti-archive', 'Программы'),
                    $this->navItem(route('groups.index'), 'ti-briefcase', 'Организации'),
                    $this->navItem(route('news.index'), 'ti-bookmark-alt', 'Новости'),
                    $this->navItem(route('business.index'), 'ti-money', 'Бизнес'),
                ]),
                $this->navItem(route('prominent.area.index'), 'ti-layout-list-thumb', '100 имен', [
                    $this->navItem(route('prominent.area.index'), 'ti-location-arrow', 'Районы'),
                    $this->navItem(route('prominent.direction.index'), 'ti-direction-alt', 'Направления'),
                    $this->navItem(route('prominent.user.index'), 'ti-user', 'Люди'),
                ]),
                $this->navItem(route('faq.index'), 'ti-tag', 'Гид/FAQ', [
                    $this->navItem(route('guide.index'), 'ti-help-alt', 'Гид'),
                    $this->navItem(route('faq.index'), 'ti-help', 'FAQ'),
                ]),
                $this->navItem(route('survey.index'), 'ti-notepad', 'Опрос/Форум', [
                    $this->navItem(route('survey.index'), 'ti-check-box', 'Опросы'),
                    $this->navItem(route('forum.index'), 'ti-comments', 'Форум'),
                ]),

            ];
        } else {
            return [
                $this->navItem(route('welcome'), 'ti-arrow-left', 'Вебсайт')
            ];
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
