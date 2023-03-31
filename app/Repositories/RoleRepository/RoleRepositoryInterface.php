<?php

namespace App\Repositories\RoleRepository;

interface RoleRepositoryInterface
{
    public function all();

    public function store($attributes);

    public function update($role , $attributes);

    public function delete($role);

}
