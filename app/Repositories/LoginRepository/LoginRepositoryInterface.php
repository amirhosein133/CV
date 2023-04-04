<?php

namespace App\Repositories\LoginRepository;

interface LoginRepositoryInterface
{
    public function validation($attributes);

    public function PostValidation($attributes);

    public function createCode();

    public function RepeatMistak();

    public function loginApi($attributes);

    public function respondWithToken($token);

}
