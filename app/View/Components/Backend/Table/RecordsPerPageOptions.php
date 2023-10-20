<?php

namespace App\View\Components\Backend\Table;

use Illuminate\View\Component;
use Illuminate\View\View;

class RecordsPerPageOptions extends Component
{
    public $recordsPerPageOptions;

    public function __construct($recordsPerPageOptions) {
        $this->recordsPerPageOptions = $recordsPerPageOptions;
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('backend.components.table.records-per-page-options');
    }
}
