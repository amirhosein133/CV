<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Category;
use App\Models\Project;
use App\Repositories\ProjectRepository\ProjectRepositoryInterface;
use App\Traits\CreateMedia;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectController extends Controller
{
    use CreateMedia;

    public $repository;

    public function __construct(ProjectRepositoryInterface $repository)
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
        $projects = Project::where('secret' , 0)->paginate();
        return view('projects.index', compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('projects.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {

        $imageUrls = $this->uploadMedia($request->file('files'), 'Images', Project::class);
        $project = $this->repository->create($request->all());
        $this->repository->MapData($imageUrls, $project);
        Alert::success('', 'عملیات با موفقیت انجام شد');
        return redirect(route('project.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $comment = new \App\Models\Comment();
        return view('projects.show', compact('project' , 'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        $media = $this->FindMedia($project);
        return view('projects.edit', compact('project', 'media', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $files = $request->file('files');
        if ($files) {
            $media = $this->FindMedia($project);
            foreach ($media as $m) {
                unlink(public_path($m->url));
                $this->destroyMedia($project);
            }
            $imageUrls = $this->uploadMedia($request->file('files'), 'Images', Project::class);
            $this->repository->MapData($imageUrls, $project);
        }
        Alert::success('', 'عملیات با موفقیت انجام شد');
        return redirect(route('project.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $media = $this->FindMedia($project);
        foreach ($media as $m) {
            unlink(public_path($m->url));
            $this->destroyMedia($project);
        }
        $this->repository->delete($project);
        Alert::success('', 'عملیات با موفقیت انجام شد');
        return redirect(route('project.index'));
    }
}
