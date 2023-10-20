<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;
use Illuminate\View\View;

class InputError extends Component
{
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('backend.components.input-error');
    }
}
