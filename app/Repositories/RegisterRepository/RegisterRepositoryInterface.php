<?php

namespace App\Repositories\RegisterRepository;

interface RegisterRepositoryInterface
{
    public function validation($attributes);

    public function PostValidation($attributes);

    public function createCode();

    public function RepeatMistak();

    public function RegisteredApi($attributes);
}
