<?php

namespace App\Repositories\ArticleRepository;

interface ArticleRepositoryInterface
{
    public function all();

    public function allWithSearch($keyword);


    public function store($user, $attribute);

    public function update($article, $attribute);

    public function delete($article);

    public function getMoreFavorite();

    public function createWithAdmin();

}
