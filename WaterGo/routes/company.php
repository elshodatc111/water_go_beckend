<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

Route::get('/company', [CompanyController::class, 'index'])->name('company');
Route::post('/company/crate', [CompanyController::class, 'crate'])->name('company_crate');
Route::get('/company_show/{id}', [CompanyController::class, 'company_show'])->name('company_show');
Route::put('/company/update/first/{id}', [CompanyController::class, 'company_update_one'])->name('company_update_one');
Route::put('/company/update/two/{id}', [CompanyController::class, 'company_update_two'])->name('company_update_two');
Route::put('/company/paymart/create/{id}', [CompanyController::class, 'company_paymart_create'])->name('company_paymart_create');
Route::put('/company/paket/create/{id}', [CompanyController::class, 'company_paket_create'])->name('company_paket_create');
Route::put('/company/user/create/{id}', [CompanyController::class, 'company_user_create'])->name('company_user_create');
Route::put('/company/user/delete/{id}', [CompanyController::class, 'company_user_delete'])->name('company_user_delete');
Route::put('/company/sms/text/{id}', [CompanyController::class, 'company_sms_text_update'])->name('company_sms_text_update');