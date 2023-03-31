<?php

namespace App\Repositories\ArticleRepository;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Favorite;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ElequentArticleRepository extends Controller implements ArticleRepositoryInterface
{
    public $model;

    public function __construct(Article $article)
    {
        $this->model = $article;
    }

    public function all()
    {
        return $articles = $this->model->all();
    }

    public function allWithSearch($keyword)
    {
        if (!is_null($keyword)) {
            return $articles = $this->model->search($keyword, ['user', 'categories'], $this->model->getFillable())->get();
        } else {
            return $articles = $this->model->all();
        }
    }

    public function store($user, $attribute)
    {
        $article = $this->model->create([
            'user_id' => $user->id,
            'name' => $attribute['name'],
            'slug' => Str::random(16),
            'description' => $attribute['description']
        ]);
        $article->categories()->attach($attribute['categories']);
        return $article;
    }

    public function update($article, $attribute)
    {
        $article->update([
            'name' => $attribute['name'],
            'description' => $attribute['description'],
        ]);
        if (isset($attribute['categories'])) {
            $article->categories()->sync($attribute['categories']);
        } else {
            $article->categories()->delete();
        }
    }

    public function delete($article)
    {
        $article->delete();
    }

    public function getMoreFavorite()
    {
        $moreFavorites = $this->model::withCount('favorites')->having('favorites_count' , '>' ,0)->orderBy('favorites_count' , 'DESC')->take(5)->get();
        return $moreFavorites;
    }

    public function createWithAdmin()
    {
        $users = User::whereHas('roles', function (Builder $query) {
            $query->where('name', 'Admin');
        })->pluck('id');
        foreach ($this->all() as $article) {
            foreach ($users as $user) {
                if ($article->user_id == $user) {
                    $articles[] = $article;
                }
            }
        }
        return $articles;
    }
}
