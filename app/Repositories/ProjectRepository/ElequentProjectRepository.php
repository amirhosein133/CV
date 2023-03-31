<?php

namespace App\Repositories\ProjectRepository;

use App\Models\Project;
use App\Traits\CreateMedia;

class ElequentProjectRepository implements ProjectRepositoryInterface
{
    use CreateMedia;

    public $model;

    public function __construct(Project $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }
    public function create($attributes)
    {

        $project = $this->model->create([
            'user_id' => auth()->id(),
            'name' => $attributes['name'],
            'description' => $attributes['description'],
            'secret' => $attributes['secret'],
        ]);
        $project->categories()->attach($attributes['categories']);
        return $project;
    }

    public function update($project, $attributes)
    {
        return $project->update($attributes);
    }

    public function delete($project)
    {
        return $project->delete();
    }

    public function MapData($imageUrls, $project)
    {
        foreach ($imageUrls as $url) {
            $data = [
                'url' => $url['original'],
                'type' => 'images',
                'mediable_id' => $project->id,
                'mediable_type' => get_class($project),
            ];
            $this->CreateMedia($data);
        }
    }

}
