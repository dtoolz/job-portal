<?php

use App\Http\Controllers\Candidate\CandidateController;
use App\Http\Controllers\Candidate\CandidateProfileManagementController;
use App\Http\Controllers\Frontend\ForgotPasswordController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\SignupController;
use Illuminate\Support\Facades\Route;

//candidate unguarded routes
Route::post('candidate_login_submit', [LoginController::class, 'candidate_login_submit'])->name('candidate_login_submit');
Route::post('candidate_signup_submit', [SignupController::class, 'candidate_signup_submit'])->name('candidate_signup_submit');
Route::get('candidate_signup_verify/{token}/{email}', [SignupController::class, 'candidate_signup_verify'])->name('candidate_signup_verify');
Route::get('forgot-password/candidate', [ForgotPasswordController::class, 'candidate_forgot_password'])->name('candidate_forgot_password');
Route::post('forgot-password/candidate/submit', [ForgotPasswordController::class, 'candidate_forgot_password_submit'])->name('candidate_forgot_password_submit');
Route::get('reset-password/candidate/{token}/{email}', [ForgotPasswordController::class, 'candidate_reset_password'])->name('candidate_reset_password');
Route::post('reset-password/candidate/submit', [ForgotPasswordController::class, 'candidate_reset_password_submit'])->name('candidate_reset_password_submit');

/* Candidate Middleware */
Route::middleware(['candidate:candidate'])->group(function () {
    Route::get('/candidate/dashboard', [CandidateController::class, 'dashboard'])->name('candidate_dashboard');
    Route::get('/candidate/logout', [LoginController::class, 'candidate_logout'])->name('candidate_logout');

    Route::get('/candidate/edit-profile', [CandidateProfileManagementController::class, 'edit_profile'])->name('candidate_edit_profile');
    Route::post('/candidate/edit-profile/update', [CandidateProfileManagementController::class, 'edit_profile_update'])->name('candidate_edit_profile_update');

    Route::get('/candidate/edit-password', [CandidateProfileManagementController::class, 'edit_password'])->name('candidate_edit_password');
    Route::post('/candidate/edit-password/update', [CandidateProfileManagementController::class, 'edit_password_update'])->name('candidate_edit_password_update');
}); 

