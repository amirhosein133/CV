<?php

namespace App\Repositories\UserRepository;

interface UserRepositoryInterface
{
    public function all();

    public function update($attributes , $user);

    public function userHaveArticle();

    public function userhasrole();

}
