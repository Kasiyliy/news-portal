<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 16:04
 */

namespace App\View\Components\Admin;

use App\View\BaseComponent;

class InputFormGroup extends BaseComponent
{
    public $name;
    public $type;
    public $placeholder;
    public $label;
    public $errors;
    public $required;
    public $value;

    public function __construct($name, $type, $placeholder, $label, $errors = [], $required = true, $value = null)
    {
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->label = $label;
        $this->errors = $errors;
        $this->required = $required;
        $this->value = $value;
    }

    public function render()
    {
        return $this->coreView('forms.input-form-group');
    }

}
