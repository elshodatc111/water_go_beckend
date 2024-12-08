<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/emploes', [UserController::class, 'index'])->name('emploes');
Route::put('/emploes/create/{id}', [UserController::class, 'emploes_create'])->name('emploes_create');
Route::get('/emploes_show/{id}', [UserController::class, 'emploes_show'])->name('emploes_show');


require base_path('routes/company.php');