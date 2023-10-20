<?php

namespace App\View\Components\Backend\Form;

use Illuminate\View\Component;
use Illuminate\View\View;

class Actions extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('backend.components.form.actions');
    }
}
