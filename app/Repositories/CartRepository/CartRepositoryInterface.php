<?php

namespace App\Repositories\CartRepository;

use App\Models\Cart;
use App\Models\Product;

interface CartRepositoryInterface
{

    public function all();

    public function store($attributes , Product $product);

    public function delete(Cart $cart);

}
