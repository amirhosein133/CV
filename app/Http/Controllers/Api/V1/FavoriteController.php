<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Blog\HomeController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FavoriteController extends HomeController
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function favorite(Request $request)
    {
        $model = Product::whereId($request->model_id)->first();
        $check = $this->chackFavorite($model, \auth('api')->id());
        if ($check == false) {
            $this->makeFavorite($request->all());
            return response()->json(['message' => 'add favorite is succses'], 200);
        } else {
            $this->deleteFavorite($request->all());
            return response()->json(['message' => 'delete favorite is succses'], 200);
        }
    }

}
