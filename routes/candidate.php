<?php

use App\Http\Controllers\Candidate\CandidateAwardController;
use App\Http\Controllers\Candidate\CandidateController;
use App\Http\Controllers\Candidate\CandidateEducationController;
use App\Http\Controllers\Candidate\CandidateProfileManagementController;
use App\Http\Controllers\Candidate\CandidateResumeController;
use App\Http\Controllers\Candidate\CandidateWorkExperienceController;
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

    Route::get('/candidate/education/index', [CandidateEducationController::class, 'education'])->name('candidate_education_index');
    Route::get('/candidate/education/create', [CandidateEducationController::class, 'education_create'])->name('candidate_education_create');
    Route::post('/candidate/education/store', [CandidateEducationController::class, 'education_store'])->name('candidate_education_store');
    Route::get('/candidate/education/edit/{id}', [CandidateEducationController::class, 'education_edit'])->name('candidate_education_edit');
    Route::post('/candidate/education/update/{id}', [CandidateEducationController::class, 'education_update'])->name('candidate_education_update');
    Route::get('/candidate/education/delete/{id}', [CandidateEducationController::class, 'education_delete'])->name('candidate_education_delete');

    
    Route::get('/candidate/skill/index', [CandidateProfileManagementController::class, 'skill'])->name('candidate_skill_index');
    Route::get('/candidate/skill/create', [CandidateProfileManagementController::class, 'skill_create'])->name('candidate_skill_create');
    Route::post('/candidate/skill/store', [CandidateProfileManagementController::class, 'skill_store'])->name('candidate_skill_store');
    Route::get('/candidate/skill/edit/{id}', [CandidateProfileManagementController::class, 'skill_edit'])->name('candidate_skill_edit');
    Route::post('/candidate/skill/update/{id}', [CandidateProfileManagementController::class, 'skill_update'])->name('candidate_skill_update');
    Route::get('/candidate/skill/delete/{id}', [CandidateProfileManagementController::class, 'skill_delete'])->name('candidate_skill_delete');

    Route::get('/candidate/experience/index', [CandidateWorkExperienceController::class, 'experience'])->name('candidate_experience_index');
    Route::get('/candidate/experience/create', [CandidateWorkExperienceController::class, 'experience_create'])->name('candidate_experience_create');
    Route::post('/candidate/experience/store', [CandidateWorkExperienceController::class, 'experience_store'])->name('candidate_experience_store');
    Route::get('/candidate/experience/edit/{id}', [CandidateWorkExperienceController::class, 'experience_edit'])->name('candidate_experience_edit');
    Route::post('/candidate/experience/update/{id}', [CandidateWorkExperienceController::class, 'experience_update'])->name('candidate_experience_update');
    Route::get('/candidate/experience/delete/{id}', [CandidateWorkExperienceController::class, 'experience_delete'])->name('candidate_experience_delete');

    Route::get('/candidate/award/index', [CandidateAwardController::class, 'award'])->name('candidate_award_index');
    Route::get('/candidate/award/create', [CandidateAwardController::class, 'award_create'])->name('candidate_award_create');
    Route::post('/candidate/award/store', [CandidateAwardController::class, 'award_store'])->name('candidate_award_store');
    Route::get('/candidate/award/edit/{id}', [CandidateAwardController::class, 'award_edit'])->name('candidate_award_edit');
    Route::post('/candidate/award/update/{id}', [CandidateAwardController::class, 'award_update'])->name('candidate_award_update');
    Route::get('/candidate/award/delete/{id}', [CandidateAwardController::class, 'award_delete'])->name('candidate_award_delete');

    Route::get('/candidate/resume/index', [CandidateResumeController::class, 'resume'])->name('candidate_resume_index');
    Route::get('/candidate/resume/create', [CandidateResumeController::class, 'resume_create'])->name('candidate_resume_create');
    Route::post('/candidate/resume/store', [CandidateResumeController::class, 'resume_store'])->name('candidate_resume_store');
    Route::get('/candidate/resume/edit/{id}', [CandidateResumeController::class, 'resume_edit'])->name('candidate_resume_edit');
    Route::post('/candidate/resume/update/{id}', [CandidateResumeController::class, 'resume_update'])->name('candidate_resume_update');
    Route::get('/candidate/resume/delete/{id}', [CandidateResumeController::class, 'resume_delete'])->name('candidate_resume_delete');
}); 

