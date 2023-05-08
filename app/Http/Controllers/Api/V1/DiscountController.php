<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use App\Repositories\DiscountRepository\DiscountRepositoryInterface;
use Illuminate\Http\Request;

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

}
