<?php

use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Frontend\ForgotPasswordController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\SignupController;
use Illuminate\Support\Facades\Route;

//company unguarded routes
Route::post('company_login_submit', [LoginController::class, 'company_login_submit'])->name('company_login_submit');
Route::post('company_signup_submit', [SignupController::class, 'company_signup_submit'])->name('company_signup_submit');
Route::get('company_signup_verify/{token}/{email}', [SignupController::class, 'company_signup_verify'])->name('company_signup_verify');
Route::get('forgot-password/company', [ForgotPasswordController::class, 'company_forgot_password'])->name('company_forgot_password');

/* Company Middleware */
Route::middleware(['company:company'])->group(function () {
    Route::get('/company/dashboard', [CompanyController::class, 'dashboard'])->name('company_dashboard');
    Route::get('/company/logout', [LoginController::class, 'company_logout'])->name('company_logout');
});
