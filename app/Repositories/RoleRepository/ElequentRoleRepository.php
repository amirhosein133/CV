<?php

namespace App\Repositories\RoleRepository;

use App\Models\Role;

class ElequentRoleRepository implements RoleRepositoryInterface
{
    public $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return Role::all();
    }

    public function store($attributes)
    {
        $role = $this->model->create([
            'name' => $attributes['name'],
            'description' => $attributes['description']
        ]);
        if (isset($attributes['users'])) {
            $role->users()->attach($attributes['users']);
        }
        if (isset($attributes['permissions']))
            $role->permissions()->attach($attributes['permissions']);
        return $role;
    }

    public function update($role , $attributes)
    {
        $role->update([
           'name' => $attributes['name'],
            'description' => $attributes['description']
        ]);
        if (isset($attributes['users'])) {
            $role->users()->sync($attributes['users']);
        }
        if (isset($attributes['permissions'])) {
            $role->permissions()->sync($attributes['permissions']);
        }
    }

    public function delete($role)
    {
       $role->delete();
    }

}
