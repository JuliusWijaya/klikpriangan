<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\SinglePageController;

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

Route::get('/', [PagesController::class, 'index']);
Route::get('/pages/about', [PagesController::class, 'about']);
Route::get('/redaksi', [PagesController::class, 'redaksi']);
Route::get('/pedoman-media-siber', [PagesController::class, 'pedomanMedia']);
Route::get('/info-iklan', [PagesController::class, 'infoIklan']);
Route::get('/kontak', [PagesController::class, 'contact']);

Route::get('/category/{category:slug}', [PagesController::class, 'category']);
Route::get('/{post:slug}', [PagesController::class, 'detailPost']);
Route::get('/author/{author:username}', [PagesController::class, 'authorPost']);
Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/login', [AuthenticationController::class, 'loginAction'])->name('login.action');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::middleware('only.admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::resource('categories', CategoryController::class);
        Route::get('/categories/{category:slug}/edit', [CategoryController::class, 'edit']);
        Route::get('/categories/create/checkSlug', [CategoryController::class, 'show']);

        Route::resource('posts', PostController::class);
        Route::get('/posts/details/{post:slug}', [PostController::class, 'show']);
        Route::get('/posts/{post:slug}/edit', [PostController::class, 'edit']);
        Route::get('/posts/create/checkSlug', [PostController::class, 'checkSlug']);

        Route::resource('users', UserController::class);
        Route::get('/users/details/{user:username}', [UserController::class, 'show']);
        Route::get('/users/inactive', [UserController::class, 'status']);
    });
});