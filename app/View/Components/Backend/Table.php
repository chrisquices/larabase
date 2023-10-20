<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;
use Illuminate\View\View;

class Table extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('backend.components.table');
    }
}
