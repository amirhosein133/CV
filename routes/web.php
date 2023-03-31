<?php


use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\Blog\ArticleController;
use App\Http\Controllers\Blog\PanelController;
use App\Http\Controllers\Blog\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PanelController::class, 'index'])->name('home');
Route::post('comment', [PanelController::class, 'MakeComment'])->name('create.comment')->middleware('auth');
Route::group(['middleware' => ['guest']], function () {
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('RegisterValid', [RegisterController::class, 'validation']);
    Route::get('get-validation', [RegisterController::class, 'GetValidation'])->name('get-validation');
    Route::post('registerPostValid', [RegisterController::class, 'PostValidation']);
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('LoginValid', [LoginController::class, 'validation']);
    Route::get('get-validationLog', [LoginController::class, 'GetValidation'])->name('login.get-validation');
    Route::post('loginPostValid', [LoginController::class, 'PostValidation']);
});
Route::resource('article', ArticleController::class)->except('show', 'edit', 'update', 'destroy', 'index')->middleware('article');
Route::get('article', [ArticleController::class, 'index'])->name('article.index');
Route::get('article/{article:slug}', [ArticleController::class, 'show'])->name('article.show');
Route::get('article/{article:slug}/edit', [ArticleController::class, 'edit'])->name('article.edit')->middleware('article');
Route::patch('article/{article:slug}', [ArticleController::class, 'update'])->name('article.update')->middleware('article');
Route::delete('article/{article:slug}', [ArticleController::class, 'destroy'])->name('article.destroy')->middleware('article');

Route::get('makeConnection' , [PanelController::class , 'ConnectionView'])->name('connection');
Route::post('makeConnection', [PanelController::class, 'MakeConnection'])->name('connectionPost');
Route::post('favorite', [PanelController::class, 'Favorite'])->name('favorite');

Route::get('updateProfile/{user}', [UserController::class, 'edit'])->name('updateProfile');
Route::POST('updateProfile/{user}', [UserController::class, 'update'])->name('updateProfilePost');

Route::resource('project', ProjectController::class)->except('index' , 'show')->middleware('project');
Route::get('project',[ProjectController::class , 'index'])->name('project.index');
Route::get('project/{project}',[ProjectController::class , 'show'])->name('project.show');

Route::get('logout', function () {
    auth()->logout();
});

Route::get('aboutMe' , [PanelController::class , 'aboutMe'])->name('aboutMe');
Route::get('course' , function (){
   return view('course.index');
})->name('course');
