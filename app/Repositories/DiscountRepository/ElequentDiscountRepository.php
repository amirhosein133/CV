<?php

namespace App\Repositories\DiscountRepository;

use App\Models\Discount;

class ElequentDiscountRepository implements DiscountRepositoryInterface
{
    public function store($attributes)
    {
        Discount::create($attributes);
    }

    public function update($attributes, Discount $discount)
    {
        $discount->update($attributes);
    }

    public function delete(Discount $discount)
    {
        $discount->delete();
    }

}
