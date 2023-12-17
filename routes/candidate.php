<?php

use App\Http\Controllers\Frontend\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('forgot-password/candidate', [ForgotPasswordController::class, 'candidate_forgot_password'])->name('candidate_forgot_password');
