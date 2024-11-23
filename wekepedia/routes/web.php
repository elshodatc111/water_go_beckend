<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/search', [HomeController::class, 'search'])->name('search');
Route::get('/post_show/{id}', [HomeController::class, 'post_show'])->name('post_show');

Route::get('/post_create', [PostController::class, 'post_create'])->name('post_create');
Route::post('/post_creates', [PostController::class, 'post_creates'])->name('post_creates');

Route::get('/user', [PostController::class, 'user'])->name('user');
Route::post('/user_create', [PostController::class, 'user_create'])->name('user_create');
Route::delete('/user_delete/{id}', [PostController::class, 'user_delete'])->name('user_delete');

Route::get('/profile', [PostController::class, 'profile'])->name('profile');
Route::post('/password/update', [PostController::class, 'updatePassword'])->name('update_password');
