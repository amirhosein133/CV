<?php

namespace App\Http\Controllers\Blog;

use App\Event\CreateCommentEvent;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\BaseModel;
use App\Models\Connection;
use App\Models\Favorite;
use App\Models\User;
use App\Repositories\ConnectionRepository\ConnectionRepositoryInterface;
use App\Traits\CreateComment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use CreateComment;
    public $repository;
    public function __construct(ConnectionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    protected function Comment($attributes)
    {
        $this->CreateComment($attributes);
        $article = Article::whereId($attributes['commentable_id'])->first();
        $type = BaseModel::TYPE_COMMENT;
        event(new CreateCommentEvent($article, $type));

    }

    protected function Connection($attibutes)
    {
        $connection = $this->repository->createConnection($attibutes);
        $AdminUser = new User();
        $AdminUser = $AdminUser->FindAdmin();
        event(new CreateCommentEvent($AdminUser, $attibutes['type'] ?? BaseModel::TYPE_CONNECTION));
        return $connection;
    }

    protected function makeFavorite($attributes)
    {
        \auth()->user()->favorites()->create([
            'favoritable_id' => $attributes['model_id'],
            'favoritable_type' => $attributes['model_type']
        ]);
    }

    public static function chackFavorite($model, $user_id)
    {
        $favorite = Favorite::where('user_id', $user_id)->where('favoritable_id', $model->id)->where('favoritable_type', get_class($model))->first();
        if (isset($favorite))
            return $favorite->favoritable_id == $model->id;
    }

    protected function deleteFavorite($attributes)
    {
        Favorite::where('user_id', \auth()->id())->where('favoritable_id', $attributes['model_id'])->where('favoritable_type', $attributes['model_type'])->delete();
    }
}
