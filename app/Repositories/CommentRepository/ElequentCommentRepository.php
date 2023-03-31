<?php

namespace App\Repositories\CommentRepository;

use App\Models\Comment;

class ElequentCommentRepository implements CommentRepositoryInterface
{
    public $model;

    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

    public function all($keyword)
    {
        if (!is_null($keyword)) {
            $comments = $this->model->search($keyword, ['user'], $this->model->getFillable())->get();
        } else {
            $comments = $this->model->all();
        }
        return $comments;
    }

    public function changeStatus($comment)
    {
        $comment->update(['approved' => 1]);
    }

    public function delete($comment)
    {
        $comment->delete();
    }

    public function listOfNotConfirmed()
    {
       return $this->model->where('approved' , 0)->get();
    }

}
