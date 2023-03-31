<?php

namespace App\Repositories\CommentRepository;

interface CommentRepositoryInterface
{
    public function all($keyword);

    public function changeStatus($comment);

    public function delete($comment);

    public function listOfNotConfirmed();

}
