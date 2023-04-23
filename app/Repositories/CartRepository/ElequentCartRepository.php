<?php

namespace App\Repositories\CartRepository;

use App\Models\Cart;
use App\Models\Product;

class ElequentCartRepository implements CartRepositoryInterface
{

    public function all()
    {
        return Cart::where('user_id' , auth('api')->id())->paginate();
    }

    public function store($attributes, Product $product)
    {
        $check = Cart::where('product_name', $product->name)->where('user_id' , auth('api')->id())->first();
        if (!isset($check)) {
            auth('api')->user()->carts()->create([
                'product_name' => $product->name,
                'quantity' => $attributes['quantity'],
                'product_price' => $product->price,
                'total_price' => intval($attributes['quantity']) * intval($product->price)
            ]);
        } else {
            $check->update([
                'quantity' => intval($check->quantity) + intval($attributes['quantity']),
                'total_price' => intval($check->total_price) + (intval($attributes['quantity']) * intval($product->price))
            ]);
        }
    }

    public function delete(Cart $cart)
    {
        $cart->delete();
    }

}
