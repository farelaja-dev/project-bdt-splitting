<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'create'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'store'])->name('login.store');
});

Route::post('/admin/logout', [AuthController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', PostController::class)->except(['show']);
});
