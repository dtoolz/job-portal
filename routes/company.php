<?php

use App\Http\Controllers\Frontend\ForgotPasswordController;
use Illuminate\Support\Facades\Route;


//company unguarded routes
Route::get('forgot-password/company', [ForgotPasswordController::class, 'company_forgot_password'])->name('company_forgot_password');
