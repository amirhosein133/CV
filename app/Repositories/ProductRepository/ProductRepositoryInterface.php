<?php

namespace App\Repositories\ProductRepository;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function all();

    public function store($attributes);

    public function update($attributes ,Product $product);

    public function delete(Product $product);

}
