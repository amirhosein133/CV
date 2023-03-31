<?php

namespace App\Repositories\UserRepository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ElequentUserRepository implements UserRepositoryInterface
{
    public $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function update($attributes, $user)
    {
        $user->update([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'mobile' => $attributes['mobile'],
//            'password' => isset($attributes['password']) ? Hash::make($attributes['password']) : null,
        ]);
        isset($attributes['bio']) ? $user->extra_attributes['bio'] = $attributes['bio'] : $user->extra_attributes['bio'] = '';
        $user->save();
    }
    public function userHaveArticle()
    {
        return $this->model->has('articles')->get();
    }

    public function userhasrole()
    {
        return $this->model->has('roles')->get();
    }

}
