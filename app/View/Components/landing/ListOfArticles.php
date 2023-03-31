<?php

namespace App\View\Components\landing;

use App\Models\Article;
use Illuminate\View\Component;

class ListOfArticles extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $articles;

    public function __construct()
    {
        $this->articles = Article::latest()->take(3)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.landing.list-of-articles');
    }
}
