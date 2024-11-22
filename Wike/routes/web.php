<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TitleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::post('/show', [TitleController::class, 'show'])->name('show');
Route::get('/all', [TitleController::class, 'all'])->name('all');
Route::get('/post/{id}', [TitleController::class, 'showUpdate'])->name('showUpdate');

Route::middleware('auth')->group(function () {
    Route::put('/post/{id}', [TitleController::class, 'showUpdateStory'])->name('showUpdateStory');
    Route::delete('/post/{id}', [TitleController::class, 'showDeleteStory'])->name('showDeleteStory');
    Route::get('/create', [HomeController::class, 'createSubject'])->name('createSubject');
    Route::post('/create', [HomeController::class, 'createStory'])->name('createStory');
    Route::get('/employees', [HomeController::class, 'Employees'])->name('Employees');
    Route::delete('/employees/delete/{id}', [HomeController::class, 'EmployeesDelete'])->name('EmployeesDelete');
    Route::post('/employees/story', [HomeController::class, 'EmployeesStory'])->name('EmployeesStory');
});

require __DIR__.'/auth.php';
