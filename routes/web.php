<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
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
Route::get('/klikpriangan/about-us', [PagesController::class, 'about']);
Route::get('/klikpriangan/redaksi', [PagesController::class, 'redaksi']);
Route::get('/klikpriangan/pedoman-media-siber', [PagesController::class, 'pedomanMedia']);
Route::get('/klikpriangan/info-iklan', [PagesController::class, 'infoIklan']);
Route::get('/klikpriangan/kontak', [PagesController::class, 'contact']);

Route::get('/klikpriangan/login', [AuthenticationController::class, 'login']);
Route::post('/klikpriangan/login', [AuthenticationController::class, 'loginAction'])->name('login.action');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::middleware('only.admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::resource('category', CategoryController::class);
        Route::resource('/posts', PostController::class);
        Route::get('/posts/create/checkSlug', [PostController::class, 'show']);
    });
});