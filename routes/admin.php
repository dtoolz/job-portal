<?php

use App\Http\Controllers\Admin\AdminBlogPageItemController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminHomePageContentController;
use App\Http\Controllers\Admin\AdminJobCategoryController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminWhyChooseController;
use Illuminate\Support\Facades\Route;



//Admin unauthenticated routes
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/forgot-password', [AdminLoginController::class, 'forgot_password'])->name('admin_forgot_password');
Route::post('/admin/forgot-password-submit', [AdminLoginController::class, 'forgot_password_submit'])->name('admin_forgot_password_submit');
Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('/admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

/* Admin Middleware */
Route::middleware(['admin:admin'])->group(function() {
    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home');
    Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');

    Route::get('/admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile');
    Route::post('/admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');

    Route::get('/admin/home-page-content', [AdminHomePageContentController::class, 'index'])->name('admin_home_page_content');
    Route::post('/admin/home-page-content/update', [AdminHomePageContentController::class, 'update'])->name('admin_home_page_content_update');

    Route::get('/admin/job-category/index', [AdminJobCategoryController::class, 'index'])->name('admin_job_category_index');
    Route::get('/admin/job-category/create', [AdminJobCategoryController::class, 'create'])->name('admin_job_category_create');
    Route::post('/admin/job-category/store', [AdminJobCategoryController::class, 'store'])->name('admin_job_category_store');
    Route::get('/admin/job-category/edit/{id}', [AdminJobCategoryController::class, 'edit'])->name('admin_job_category_edit');
    Route::post('/admin/job-category/update/{id}', [AdminJobCategoryController::class, 'update'])->name('admin_job_category_update');
    Route::get('/admin/job-category/delete/{id}', [AdminJobCategoryController::class, 'delete'])->name('admin_job_category_delete');

    Route::get('/admin/why-choose/index', [AdminWhyChooseController::class, 'index'])->name('admin_why_choose_item');
    Route::get('/admin/why-choose/create', [AdminWhyChooseController::class, 'create'])->name('admin_why_choose_item_create');
    Route::post('/admin/why-choose/store', [AdminWhyChooseController::class, 'store'])->name('admin_why_choose_item_store');
    Route::get('/admin/why-choose/edit/{id}', [AdminWhyChooseController::class, 'edit'])->name('admin_why_choose_item_edit');
    Route::post('/admin/why-choose/update/{id}', [AdminWhyChooseController::class, 'update'])->name('admin_why_choose_item_update');
    Route::get('/admin/why-choose/delete/{id}', [AdminWhyChooseController::class, 'delete'])->name('admin_why_choose_item_delete');

    Route::get('/admin/testimonial/index', [AdminTestimonialController::class, 'index'])->name('admin_testimonial');
    Route::get('/admin/testimonial/create', [AdminTestimonialController::class, 'create'])->name('admin_testimonial_create');
    Route::post('/admin/testimonial/store', [AdminTestimonialController::class, 'store'])->name('admin_testimonial_store');
    Route::get('/admin/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit');
    Route::post('/admin/testimonial/update/{id}', [AdminTestimonialController::class, 'update'])->name('admin_testimonial_update');
    Route::get('/admin/testimonial/delete/{id}', [AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete');

    Route::get('/admin/post/index', [AdminPostController::class, 'index'])->name('admin_post');
    Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('admin_post_create');
    Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('admin_post_store');
    Route::get('/admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit');
    Route::post('/admin/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update');
    Route::get('/admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete');

    Route::get('/admin/blog-page', [AdminBlogPageItemController::class, 'index'])->name('admin_blog_page');
    Route::post('/admin/blog-page/update', [AdminBlogPageItemController::class, 'update'])->name('admin_blog_page_update');
});
