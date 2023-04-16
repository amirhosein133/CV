<?php

namespace App\Http\Controllers\Blog;

use App\Event\CreateCommentEvent;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\BaseModel;
use App\Models\Comment;
use App\Models\Connection;
use App\Models\Favorite;
use App\Models\Permission;
use App\Models\Project;
use App\Models\Role;
use App\Traits\CreateComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class PanelController extends HomeController
{
    public function index()
    {
        if (\auth()->check()) {
            return view('dashboard.dashboard');
        }
        return view('landing.welcome');
    }

    public function MakeComment(Request $request)
    {
        $this->Comment($request->all());
        Alert::success('', 'ثبت کامنت با موفقیت انجام شد');
        return redirect()->back();
    }

    public function ConnectionView()
    {
        $user = \auth()->user();
        return view('admin.connection.create', compact('user'));
    }

    public function MakeConnection(Request $request)
    {
        $this->Connection($request->all());
        Alert::success('', 'نظرتتان ثبت شد در اولین فرصت جواب تان داده میشود.');
        return redirect()->back();
    }

    public function favorite(Request $request)
    {
        //TODO list make favorite controller in blog
        switch ($request->model_type) {
            case(get_class(new Article())):
                $model = Article::whereId($request->model_id)->first();
                break;

            case (get_class(new Comment())):
                $model = Comment::whereId($request->model_id)->first();
                break;

            case (get_class(new Project())):
                $model = Project::whereId($request->model_id)->first();
                break;

        }
        $check = $this->chackFavorite($model, \auth()->id());
        if ($check == false) {
            $this->makeFavorite($request->all());
            Alert::success('', 'به لیست علاقه مندی های شما اضافه شد.');
            return redirect()->back();
        } else {
            $this->deleteFavorite($request->all());
            Alert::success('', 'از لیست علاقه مندی های شما حذف شد');
            return redirect()->back();
        }

    }

    public function aboutMe()
    {
       return view('aboutMe.index');
    }

}
