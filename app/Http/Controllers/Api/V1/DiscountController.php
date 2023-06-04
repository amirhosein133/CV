<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use App\Models\Product;
use App\Models\User;
use App\Repositories\DiscountRepository\DiscountRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DiscountController extends Controller
{
    public $repository;

    public function __construct(DiscountRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth:api');
    }

    public function store(DiscountRequest $request)
    {
        if (Discount::where('code', $request->code)->first()) {
            return response()->json(['message' => 'این کد قبلا وجود داشته'], 402);
        }
        $this->repository->store($request->all());
        return response()->json(['message' => 'discount is set'], 200);
    }

    public function update(DiscountRequest $request, Discount $discount)
    {
        $this->repository->update($request->all(), $discount);
        return response()->json(['message' => 'discount is update'], 200);
    }

    public function delete(Discount $discount)
    {
        $this->repository->delete($discount);
        return response()->json(['message' => 'discount is delete'], 200);
    }


    public function validationDiscount(Request $request, Product $product)
    {
        // TODO list For frontend we need search algoritm for type of user and product
        //TODO list Use from chain of responsibility for standard
        $discounts = Discount::whereCode($request->code)->get();

        foreach ($discounts as $discount) {
            if ($discount->discountable_type == get_class(new User()) && $discount->discountable_id == auth('api')->id()) {
                $cart = auth('api')->user()->carts()->where('product_name', $product->name)->first();
                if ($discount->limit < $cart->total_price) {
                    if ($discount->expire_time > now()) {
                        Cache::put('code', $discount, $discount->expire_time);
                        $discount->update([
                            'used_by_user' => true
                        ]);
                        return response()->json(['message' => 'total price is update'], 200);
                    } else {
                        return response()->json(['message' => 'expire_time is over'], 401);
                    }
                } else {
                    return response()->json(['message' => 'discount limit is bigger'], 401);
                }

            } elseif ($discount->discountable_type == get_class(new Product()) && $discount->discountable_id == $product->id) {
                $cart = auth('api')->user()->carts()->where('product_name', $product->name)->first();
                if ($discount->limit < $cart->total_price) {
                    if ($discount->expire_time > now()) {
                        Cache::put('code', $discount, $discount->expire_time);
                        Cache::put('product', $product);
                        $discount->update([
                            'used_by_user' => true
                        ]);
                        return response()->json(['message' => 'total price is update'], 200);
                    } else {
                        return response()->json(['message' => 'expire_time is over'], 401);
                    }
                } else {
                    return response()->json(['message' => 'discount limit is bigger'], 401);
                }
            }
        }
        return response()->json(['message' => 'discount is unvalidate'], 401);
    }

}
