<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Admin unauthenticated routes
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::get('/admin/forgot-password', [AdminLoginController::class, 'forgot_password'])->name('admin_forgot_password');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');

/* Admin Middleware */
Route::middleware(['admin:admin'])->group(function() {
    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home');
    Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
});
