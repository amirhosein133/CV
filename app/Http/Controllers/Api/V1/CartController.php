<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartCollection;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
use App\Repositories\CartRepository\CartRepositoryInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public $repository;

    public function __construct(CartRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->repository->all();
        return response()->json(new CartCollection($products), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $this->repository->store($request->all(), $product);
        return response()->json(['message' => 'add to cart is succses'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $this->repository->delete($cart);
        return response()->json(['message' => 'delete cart item is sucsess'], 200);
    }
}
