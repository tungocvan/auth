<?php

namespace App\View\Components;

use Illuminate\View\Component;


class form extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $options;    
    public function __construct($options= ['action' => '#', 'method' => 'POST','name' => 'name', 'value' => 'submit'])
    {       
        if ($options) {
            $this->options = $options;
        }
    }
 
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form');
    }
}
