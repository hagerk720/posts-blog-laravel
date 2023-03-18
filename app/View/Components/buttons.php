<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class buttons extends Component
{
    public $type ; 
    public $value ; 
    // public $v ;

    /**
     * Create a new component instance.
     */
    public function __construct($type ,$value)
    {
        //
        $this->type = $type ; 
        $this->value = $value; 
        // $this->v  = $v;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons');
    }
}
