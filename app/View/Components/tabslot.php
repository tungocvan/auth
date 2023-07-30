<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tabslot extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $item;
    public $key;
    
    public function __construct($item='',$key=0)
    {
        $this->item = $item;
        $this->key = $key;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tabslot');
    }
}
