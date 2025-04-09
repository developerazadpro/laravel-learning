<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Intro extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $intro;
    public $contactUrl;

    public function __construct($name = '', $intro = '', $contactUrl = '#')
    {
        $this->name = $name;
        $this->intro = $intro;
        $this->contactUrl = $contactUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.intro');
    }
}
