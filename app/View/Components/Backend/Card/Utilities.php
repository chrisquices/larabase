<?php

namespace App\View\Components\Backend\Card;

use Illuminate\View\Component;
use Illuminate\View\View;

class Utilities extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('backend.components.card.utilities');
    }
}
