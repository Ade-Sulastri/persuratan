<?php

namespace App\View\Components\operator;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class sidebarOperator extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.operator.sidebar-operator');
    }
}
