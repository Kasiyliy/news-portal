<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 16:41
 */

namespace App\View\Components;

use App\View\BaseComponent;

class ErrorHeader extends BaseComponent
{
    public function render()
    {
        return $this->coreView('parts.error-header');
    }
}