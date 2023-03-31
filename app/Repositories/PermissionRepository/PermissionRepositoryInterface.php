<?php

namespace App\Repositories\PermissionRepository;

interface PermissionRepositoryInterface
{
    public function all();

    public function store($attributes);

    public function update($model , $attributes);

    public function destroy($model);

}
