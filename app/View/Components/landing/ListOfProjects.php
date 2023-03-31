<?php

namespace App\View\Components\landing;

use App\Models\Category;
use App\Models\Project;
use Illuminate\View\Component;

class ListOfProjects extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $projects;
    public $categories;

    public function __construct()
    {
        $this->categories = Category::all();
        $this->projects = Project::with('medias')->take(2)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.landing.list-of-projects');
    }
}
