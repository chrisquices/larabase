<?php

namespace App\View\Components\Backend\Table;

use Illuminate\View\Component;
use Illuminate\View\View;

class Filters extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('backend.components.table.filters');
    }
}
