<?php

namespace App\View\Components\dashboard;

use Illuminate\View\Component;

class project extends Component
{
    public $projects;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->projects = auth()->user()->projects;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.project');
    }
}
