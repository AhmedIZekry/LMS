<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inputBlock extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $label,public $name,public $value=null,public $placeHolder=null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-block');
    }
}
