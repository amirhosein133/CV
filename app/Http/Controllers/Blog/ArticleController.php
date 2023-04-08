<?php

namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Repositories\ArticleRepository\ArticleRepositoryInterface;
use App\Repositories\ProjectRepository\ProjectRepositoryInterface;
use App\Traits\CreateMedia;
use App\Traits\SearchTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleController extends HomeController
{
    use SearchTrait, CreateMedia;

    public $repository;
    public $projectRepository;

    public function __construct(ArticleRepositoryInterface $repository, ProjectRepositoryInterface $projectRepository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->projectRepository = $projectRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //TODO with Ajax
        $keyword = request('search');
        $articles = $this->repository->allWithSearch($keyword);
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $imageUrls = $this->uploadMedia($request->file('files'), 'Images', Article::class);
        $article = $this->repository->store(\auth()->user(), $request->all());
        if ($imageUrls != null) {
            $this->projectRepository->MapData($imageUrls,'images', $article);
        }
        Alert::success('', 'عملیات با موفقیت انجام شد');
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $comment = new \App\Models\Comment();
        return view('article.show', compact('article', 'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categoriess = Category::all();
        $media = $this->FindMedia($article);
        return view('article.edit', compact('article', 'categoriess', 'media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $files = $request->file('files');
        if ($files) {
            $media = $this->FindMedia($article);
            foreach ($media as $m) {
                unlink(public_path($m->url));
                $this->destroyMedia($article);
            }
            $imageUrls = $this->uploadMedia($request->file('files'), 'Images', Article::class);
            $this->projectRepository->MapData($imageUrls,'images', $article);
        }
        $this->repository->update($article, $request->all());
        Alert::success('', 'عملیات با موفقیت انجام شد');
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $media = $this->FindMedia($article);
        foreach ($media as $m) {
            unlink(public_path($m->url));
            $this->destroyMedia($article);
        }
        $this->repository->delete($article);
        Alert::success('', 'عملیات با موفقیت انجام شد');
        return redirect()->route('article.index');
    }
}
