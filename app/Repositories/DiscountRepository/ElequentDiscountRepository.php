<?php

namespace App\Repositories\DiscountRepository;

use App\Models\Discount;

class ElequentDiscountRepository implements DiscountRepositoryInterface
{
    public function store($attributes)
    {
        foreach ($attributes['discountable_id'] as $item) {
            Discount::create([
                'code' => $attributes['code'],
                'percent' => $attributes['percent'],
                'limit' => $attributes['limit'],
                'expire_time' => $attributes['expire_time'],
                'discountable_id' => intval($item),
                'discountable_type' => $attributes['discountable_type']
            ]);
        }

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
