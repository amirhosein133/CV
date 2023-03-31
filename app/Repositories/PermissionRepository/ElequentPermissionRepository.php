<?php

namespace App\Repositories\PermissionRepository;

use App\Models\Permission;

class ElequentPermissionRepository implements PermissionRepositoryInterface
{
    public $model;

    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

    public function all()
    {
        return Permission::all();
    }

    public function store($attributes)
    {
        $permission = $this->model->create([
            'name' => $attributes['name'],
            'description' => $attributes['description']
        ]);
        if (isset($attributes['roles']))
            $permission->roles()->attach($attributes['roles']);
    }

    public function update($model, $attributes)
    {
        $model->update([
            'name' => $attributes['name'],
            'description' => $attributes['description']
        ]);
        if (isset($attributes['roles'])) {
            $model->roles->sync($attributes['roles']);
        } else {
            $model->roles()->delete();
        }
    }

    public function destroy($model)
    {
        $model->delete();
    }

}
