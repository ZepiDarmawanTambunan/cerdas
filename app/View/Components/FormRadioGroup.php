<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormRadioGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public $label;
    public $name;
    public $options;
    public $oldValue;

    public function __construct($label, $name, $options, $oldValue)
    {
        $this->label = $label;
        $this->name = $name;
        $this->options = $options;
        $this->oldValue = $oldValue;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-radio-group');
    }
}
