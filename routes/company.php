<?php

use App\Http\Controllers\Frontend\ForgotPasswordController;
use App\Http\Controllers\Frontend\SignupController;
use Illuminate\Support\Facades\Route;


//company unguarded routes
Route::post('company_signup_submit', [SignupController::class, 'company_signup_submit'])->name('company_signup_submit');
Route::get('company_signup_verify/{token}/{email}', [SignupController::class, 'company_signup_verify'])->name('company_signup_verify');
Route::get('forgot-password/company', [ForgotPasswordController::class, 'company_forgot_password'])->name('company_forgot_password');
