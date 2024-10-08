<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ActionComponent extends Component
{


    public $href;
    public $text;
    public $type;
    public $color ;

    public function __construct($href , $text, $type, $color)
    {
        $this->href = $href;
        $this->text = $text;
        $this->type = $type;
        $this->color = $color;

       if($type == 'create'){
        $this->color = 'primary';
        $this->text = __('keywords.add');

       }elseif($type == 'edit'){
        $this->color = 'success';
        $this->text = '<i class="fe fe-edit fa-2x"></i>';

       }elseif($type == 'show'){
       $this->color = 'warning';
       $this->text = '<i class="fe fe-eye fa-2x"></i>';

       }else{

       }
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.action-component');
    }
}
