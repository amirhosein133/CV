<?php

namespace App\View\Components\dashboard;

use App\Models\Comment;
use App\Models\Favorite;
use Illuminate\View\Component;

class favorites extends Component
{
    public $favorites;
    public $articles;
    public $comments;
    public $projects;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->favorites = auth()->user()->favorites;
        if (count($this->favorites) > 0) {
            foreach ($this->favorites as $favorite) {
                switch ($favorite->favoritable_type) {
                    case get_class(new \App\Models\Article()):
                        $this->articles[] = $favorite;
                        break;

                    case get_class(new Comment()):
                        $this->comments[] = $favorite;
                        break;

                    case get_class(new \App\Models\Project()):
                        $this->projects[] = $favorite;
                        break;
                }
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.favorites');
    }
}
