<?php

namespace App\View\Components\Backend\Form;

use Illuminate\View\Component;
use Illuminate\View\View;

class Row extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('backend.components.form.row');
    }
}
