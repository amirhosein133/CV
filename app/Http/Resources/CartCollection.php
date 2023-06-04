<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Cache;

class CartCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => CartResource::collection($this->collection),
            'meta' => [
                'count' => $this->total(),
                'total_price' => $this->TotalPrice(),
            ]
        ];
    }

    public function TotalPrice()
    {
        $total = 0;
        foreach ($this->collection as $item) {
            $total += $item->total_price;
        }
        if (Cache::has('code')) {
            $discount = Cache::get('code');
            if ($discount->discountable_type == get_class(new User()) && $discount->discountable_id == auth('api')->id()) {
                $total = $total - ($total * ($discount->percent / 100));
            }
            if (Cache::has('product')) {
                $product = Cache::get('product');
                if ($discount->discountable_type == get_class(new Product()) && $discount->discountable_id == $product->id) {
                    $total = $total - ($total * ($discount->percent / 100));
                }
            }
        }
        return $total;
    }
}
