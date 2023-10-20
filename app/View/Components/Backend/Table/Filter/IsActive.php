<?php

namespace App\View\Components\Backend\Table\Filter;

use Illuminate\View\Component;
use Illuminate\View\View;

class IsActive extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('backend.components.table.filter.is-active');
    }
}
