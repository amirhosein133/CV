<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'auth'], function ($router) {
        Route::post('validation' , [AuthController::class , 'validation']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register' , [AuthController::class , 'register']);
        Route::post('registered' , [AuthController::class , 'registered']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });
    Route::group(['prefix' => 'product'] , function (){
        Route::get('index' , [ProductController::class , 'index']);
        Route::post('store' , [ProductController::class , 'store'])->middleware('admin');
        Route::post('show/{product}' , [ProductController::class , 'show']);
        Route::put('update/{product}' , [ProductController::class , 'update'])->middleware('admin');
        Route::delete('delete/{product}' , [ProductController::class , 'destroy']);
        Route::post('upload_video/{product}' , [ProductController::class , 'uploadVideo'])->middleware('admin');
        Route::post('destroy_video/{product}' , [ProductController::class , 'destroyVideo'])->middleware('admin');
    });
    Route::group(['prefix' => 'comment'] , function (){
       Route::post('store' , [CommentController::class , 'store']);
       Route::delete('delete/{comment}' , [CommentController::class , 'destroy'])->middleware('admin');
       Route::post('changeStatus/{comment}' , [CommentController::class , 'changeStatus'])->middleware('admin');
    });
});
