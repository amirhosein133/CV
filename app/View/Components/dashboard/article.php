<?php

namespace App\View\Components\dashboard;

use Illuminate\View\Component;

class article extends Component
{
    public $articles;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->articles = auth()->user()->articles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.article');
    }
}
