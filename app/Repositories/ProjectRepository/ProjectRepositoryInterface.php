<?php

namespace App\Repositories\ProjectRepository;

interface ProjectRepositoryInterface
{
    public function all();
    public function create($attributes);

    public function update($project, $attributes);

    public function delete($project);

    public function MapData($imageUrls , $project);
}
