<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PagesController::class, 'index']);
Route::get('/klikpriangan/category/{category:slug}', [PagesController::class, 'category']);
Route::get('/klikpriangan/{post:slug}', [PagesController::class, 'detailPost']);

Route::get('/klikpriangan/about-us', [PagesController::class, 'about']);
Route::get('/klikpriangan/redaksi', [PagesController::class, 'redaksi']);
Route::get('/klikpriangan/pedoman-media-siber', [PagesController::class, 'pedomanMedia']);
Route::get('/klikpriangan/info-iklan', [PagesController::class, 'infoIklan']);
Route::get('/klikpriangan/kontak', [PagesController::class, 'contact']);

Route::get('/klikpriangan-login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/klikpriangan/login', [AuthenticationController::class, 'loginAction'])->name('login.action');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::middleware('only.admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::resource('category', CategoryController::class);
        Route::get('/category/{category:slug}/edit', [CategoryController::class, 'edit']);
        Route::get('/category/create/checkSlug', [CategoryController::class, 'show']);

        Route::resource('posts', PostController::class);
        Route::get('/posts/details/{post:slug}', [PostController::class, 'show']);
        Route::get('/posts/{post:slug}/edit', [PostController::class, 'edit']);
        Route::get('/posts/create/checkSlug', [PostController::class, 'checkSlug']);

        Route::resource('users', UserController::class);
        Route::get('/users/details/{user:username}', [UserController::class, 'show']);
        Route::get('/users/inactive', [UserController::class, 'status']);
    });
});
