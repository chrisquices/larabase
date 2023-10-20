<?php

namespace App\View\Components\Backend\Table;

use Illuminate\View\Component;
use Illuminate\View\View;

class NoFiltersFound extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('backend.components.table.no-filters-found');
    }
}
