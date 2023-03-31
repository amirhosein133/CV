<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use App\Repositories\CommentRepository\CommentRepositoryInterface;
use App\Traits\SearchTrait;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    use SearchTrait;

    public $repository;

    public function __construct(CommentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = request('search');
        $comments = $this->repository->all($keyword);
        return view('admin.comment.index', compact('comments'));
    }

    public function changeStatus(Comment $comment)
    {
        $this->repository->changeStatus($comment);
        Alert::success('', 'عملیات با موفقیت انجام شد');
        return back();
    }

    public function destroy(Comment $comment)
    {
       $this->repository->delete($comment);
        Alert::success('', 'عملیات با موفقیت انجام شد');
        return back();
    }

    public function listOfNotConfirmed()
    {
        $comments = $this->repository->listOfNotConfirmed();
        return view('admin.comment.listOfNotConfirmed' , compact('comments'));
    }
}
