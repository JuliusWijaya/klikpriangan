<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PagesController;
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
Route::get('/category/{category:slug}', [PagesController::class, 'category']);
Route::get('/post/{post:slug}', [PagesController::class, 'detail']);
Route::get('/author/{author:username}', [PagesController::class, 'authorPost']);

Route::get('/about', [SinglePageController::class, 'about']);
Route::get('/redaksi', [SinglePageController::class, 'redaksi']);
Route::get('/pedoman-media-siber', [SinglePageController::class, 'media']);
Route::get('/info-iklan', [SinglePageController::class, 'iklan']);
Route::get('/kontak', [SinglePageController::class, 'contact']);

Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/login', [AuthenticationController::class, 'loginAction'])->name('login.action');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::middleware('only.admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/profile/{user:username}', [DashboardController::class, 'profile']);
        Route::get('/setting-password', [DashboardController::class, 'password']);
        Route::post('/setting-password', [DashboardController::class, 'password_action'])->name('password.action');

        Route::put('/categories/update', [CategoryController::class, 'update']);
        Route::resource('categories', CategoryController::class);
        Route::get('/categories/create/checkSlug', [CategoryController::class, 'show']);
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);

        Route::resource('posts', PostController::class);
        Route::get('/posts/details/{post:slug}', [PostController::class, 'show']);
        Route::get('/posts/{post:slug}/edit', [PostController::class, 'edit']);
        Route::get('/posts/create/checkSlug', [PostController::class, 'checkSlug']);

        Route::get('/users/status-inactive', [UserController::class, 'status']);
        Route::resource('users', UserController::class);
        Route::get('/users/{user:username}/edit', [UserController::class, 'edit']);
        Route::get('/users/details/{user:username}', [UserController::class, 'show']);
        Route::post('/users/status/{user}', [UserController::class, 'statusActive'])->name('status.active');
    });
});