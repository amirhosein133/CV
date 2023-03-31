<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Blog\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('index');
Route::group(['prefix' => 'comment'], function () {
    Route::get('list', [CommentController::class, 'index'])->name('comment.index');
    Route::get('show/{comment}', [CommentController::class, 'show'])->name('comment.show');
    Route::post('changeStatus/{comment}', [CommentController::class, 'changeStatus'])->name('comment.changeStatus');
    Route::delete('delete/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
    Route::get('listOfNotConfirmed' , [CommentController::class , 'listOfNotConfirmed'])->name('comment.list');
});
Route::resource('user', UserController::class);
Route::get('userhavearticle' , [UserController::class , 'userHaveArticle'])->name('user.have.article');
Route::resource('role', RoleController::class);
Route::resource('permission', PermissionController::class)->except('show');
Route::get('userhasrole' , [UserController::class , 'userhasrole'])->name('user.userhasrole');


Route::resource('article', ArticleController::class)->except('show', 'edit', 'update', 'destroy', 'index');
Route::get('article', [ArticleController::class, 'index'])->name('article.index');
Route::get('article/{article:slug}', [ArticleController::class, 'show'])->name('article.show');
Route::delete('article/{article:slug}', [ArticleController::class, 'destroy'])->name('article.destroy');
Route::get('moreFavorite', [ArticleController::class, 'getMoreFavotite'])->name('article.favotite');
Route::get('createadmin', [ArticleController::class, 'createWithAdmin'])->name('article.admin.create');

Route::resource('project' , \App\Http\Controllers\Admin\ProjectController::class)->except('update' , 'edit','store','create');

Route::group(['prefix' => 'connection'] , function (){
   Route::get('/' , [AdminController::class , 'connections'])->name('connections.index');
   Route::delete('delete/{connection}' , [AdminController::class , 'deleteConnection'])->name('connection-delete');
   Route::post('changeStatus/{connection}' , [AdminController::class , 'ChangeStatusConnection'])->name('connection-changeStatus');
});
Route::get('course' , function (){
   return view('admin.course.index');
})->name('courses');
