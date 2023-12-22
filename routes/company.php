<?php

use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\CompanyPaymentController;
use App\Http\Controllers\Frontend\ForgotPasswordController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\SignupController;
use Illuminate\Support\Facades\Route;

//company unguarded routes
Route::post('company_login_submit', [LoginController::class, 'company_login_submit'])->name('company_login_submit');
Route::post('company_signup_submit', [SignupController::class, 'company_signup_submit'])->name('company_signup_submit');
Route::get('company_signup_verify/{token}/{email}', [SignupController::class, 'company_signup_verify'])->name('company_signup_verify');
Route::get('forgot-password/company', [ForgotPasswordController::class, 'company_forgot_password'])->name('company_forgot_password');
Route::post('forgot-password/company/submit', [ForgotPasswordController::class, 'company_forgot_password_submit'])->name('company_forgot_password_submit');
Route::get('reset-password/company/{token}/{email}', [ForgotPasswordController::class, 'company_reset_password'])->name('company_reset_password');
Route::post('reset-password/company/submit', [ForgotPasswordController::class, 'company_reset_password_submit'])->name('company_reset_password_submit');

/* Company Middleware */
Route::middleware(['company:company'])->group(function () {
    Route::get('/company/dashboard', [CompanyController::class, 'dashboard'])->name('company_dashboard');
    Route::get('/company/logout', [LoginController::class, 'company_logout'])->name('company_logout');


    Route::get('/company/make-payment', [CompanyPaymentController::class, 'make_payment'])->name('company_make_payment');

    Route::post('/company/paypal/payment', [CompanyPaymentController::class, 'company_paypal_payment'])->name('company_paypal_payment');
    Route::get('/company/paypal/success', [CompanyPaymentController::class, 'company_paypal_success'])->name('company_paypal_success');
    Route::get('/company/paypal/cancel', [CompanyPaymentController::class, 'company_paypal_cancel'])->name('company_paypal_cancel');

    Route::post('/company/stripe/payment', [CompanyPaymentController::class, 'company_stripe_payment'])->name('company_stripe_payment');
    Route::get('/company/stripe/success', [CompanyPaymentController::class, 'company_stripe_success'])->name('company_stripe_success');
    Route::get('/company/stripe/cancel', [CompanyPaymentController::class, 'company_stripe_cancel'])->name('company_stripe_cancel');
});
