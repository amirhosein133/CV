<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendUserEvent;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Connection;
use App\Models\Project;
use App\Models\User;
use App\Repositories\ConnectionRepository\ConnectionRepositoryInterface;
use App\Repositories\UserRepository\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public $repository;
    public $Crepository;

    public function __construct(UserRepositoryInterface $repository, ConnectionRepositoryInterface $connectionRepository)
    {
        $this->repository = $repository;
        $this->Crepository = $connectionRepository;

    }

    public function index()
    {
        $users = $this->repository->all();
        $connections = Connection::orderBy('id', 'desc')->take(3)->get();
        $comments = Comment::where('approved', 0)->take(5)->get();
        return view('admin.panel.index', compact('users', 'connections', 'comments'));
    }

    public function connections()
    {
        $key = \request('type');
        $connections = $this->Crepository->connection($key);
        return view('admin.connection.index', compact('connections', 'key'));
    }

    public function deleteConnection(Connection $connection)
    {
        $this->Crepository->destroy($connection);
        Alert::success('', 'عملیات با موفقیت انجام شد');
        return back();
    }

    public function ChangeStatusConnection(Connection $connection)
    {
        $this->Crepository->changeStatusConnection($connection);
        event(new SendUserEvent($connection->user));
        Alert::success('', 'عملیات با موفقیت انجام شد');
        return back();
    }
}
