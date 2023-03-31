<?php

namespace App\View\Components\admin\user;

use App\Models\Article;
use App\Models\User;
use Illuminate\View\Component;

class UserArticles extends Component
{
    public $articles;
    /**
     * Create a new component instance.
     * @return void
     */
    public function __construct(User $user)
    {
        $this->articles = Article::where('user_id' , $user->id)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.user.user-articles');
    }
}
