<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inputToggleBlock extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $label,public $name,public bool $checked=false,public $value=1)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-toggle-block');
    }
}
