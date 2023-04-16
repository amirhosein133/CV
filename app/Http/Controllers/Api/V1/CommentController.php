<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Blog\HomeController;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Repositories\CommentRepository\CommentRepositoryInterface;
use Illuminate\Http\Request;

class CommentController extends HomeController
{
    public $repository;

    public function __construct(CommentRepositoryInterface $repository)
    {
        $this->middleware('auth:api');
        $this->repository = $repository;
    }
    public function store(Request $request)
    {
        $product = $this->Comment($request->all());
        return response()->json(['messages' => 'add comment is succses'], 200);

    }

    public function destroy(Comment $comment)
    {
        $this->repository->delete($comment);
        return response()->json(['message' => 'delete comment is succses'], 200);

    }

    public function changeStatus(Comment $comment)
    {
        $this->repository->changeStatus($comment);
        return response()->json(['message' => 'change status comment is succses'], 200);
    }
}
