<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarTab extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */


    public $href;
    public $icon;
    public $name;
    public function __construct($href , $icon , $name)
    {
        $this->href = $href;
        $this->icon = $icon;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sidebar-tab');
    }
}
