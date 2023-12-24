<?php

use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\CompanyJobController;
use App\Http\Controllers\Company\CompanyPaymentController;
use App\Http\Controllers\Company\CompanyPhotoController;
use App\Http\Controllers\Company\CompanyProfileManagementController;
use App\Http\Controllers\Company\CompanyVideoController;
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
    Route::get('/company/make-payment', [CompanyPaymentController::class, 'make_payment'])->name('company_make_payment');
    Route::get('/company/orders', [CompanyController::class, 'orders'])->name('company_orders');
    Route::get('/company/logout', [LoginController::class, 'company_logout'])->name('company_logout');

    Route::post('/company/paypal/payment', [CompanyPaymentController::class, 'company_paypal_payment'])->name('company_paypal_payment');
    Route::get('/company/paypal/success', [CompanyPaymentController::class, 'company_paypal_success'])->name('company_paypal_success');
    Route::get('/company/paypal/cancel', [CompanyPaymentController::class, 'company_paypal_cancel'])->name('company_paypal_cancel');

    Route::post('/company/stripe/payment', [CompanyPaymentController::class, 'company_stripe_payment'])->name('company_stripe_payment');
    Route::get('/company/stripe/success', [CompanyPaymentController::class, 'company_stripe_success'])->name('company_stripe_success');
    Route::get('/company/stripe/cancel', [CompanyPaymentController::class, 'company_stripe_cancel'])->name('company_stripe_cancel');

    Route::get('/company/edit-profile', [CompanyProfileManagementController::class, 'edit_profile'])->name('company_edit_profile');
    Route::post('/company/edit-profile/update', [CompanyProfileManagementController::class, 'edit_profile_update'])->name('company_edit_profile_update');

    Route::get('/company/edit-password', [CompanyProfileManagementController::class, 'edit_password'])->name('company_edit_password');
    Route::post('/company/edit-password/update', [CompanyProfileManagementController::class, 'edit_password_update'])->name('company_edit_password_update');

    Route::get('/company/photos', [CompanyPhotoController::class, 'photos'])->name('company_photos');
    Route::post('/company/photos/submit', [CompanyPhotoController::class, 'photos_submit'])->name('company_photos_submit');
    Route::get('/company/photos/delete/{id}', [CompanyPhotoController::class, 'photos_delete'])->name('company_photos_delete');

    Route::get('/company/videos', [CompanyVideoController::class, 'videos'])->name('company_videos');
    Route::post('/company/videos/submit', [CompanyVideoController::class, 'videos_submit'])->name('company_videos_submit');
    Route::get('/company/videos/delete/{id}', [CompanyVideoController::class, 'videos_delete'])->name('company_videos_delete');

    Route::get('/company/create-job', [CompanyJobController::class, 'jobs_create'])->name('company_jobs_create');
    Route::post('/company/create-job-submit', [CompanyJobController::class, 'jobs_create_submit'])->name('company_jobs_create_submit');

    Route::get('/company/jobs', [CompanyJobController::class, 'jobs'])->name('company_jobs');
    Route::get('/company/job-edit/{id}', [CompanyJobController::class, 'jobs_edit'])->name('company_jobs_edit');
    Route::post('/company/job-update/{id}', [CompanyJobController::class, 'jobs_update'])->name('company_jobs_update');
    Route::get('/company/job-delete/{id}', [CompanyJobController::class, 'jobs_delete'])->name('company_jobs_delete');
});
