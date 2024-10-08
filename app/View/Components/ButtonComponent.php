<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonComponent extends Component
{
    
    public $href ;
    public $id ;


    public function __construct($href , $id)
    {
        $this->href = $href;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.button-component');
    }
}
