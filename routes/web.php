<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\HomeHeroController;
use App\Http\Controllers\Admin\TranslationController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\HomeCartController;
use App\Http\Controllers\Admin\HomeIncludeController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ContactMessageDataController;
use App\Http\Controllers\Admin\SubscribeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CourseController;








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

// Admin ana route - kullanıcının durumuna göre yönlendirme yapar
Route::get('/admin', function () {
    if (auth()->guard('admin')->check()) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('admin.login');
});


// Admin auth routes
Route::get('/admin/login', [AuthController::class, 'login'])
    ->name('admin.login')
    ->middleware('guest:admin');

Route::post('/admin/login', [AuthController::class, 'handleLogin'])
    ->name('admin.handle-login');

Route::post('/admin/logout', [AuthController::class, 'logout'])
    ->name('admin.logout')
    ->middleware('auth:admin');

// Admin protected routes
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Header Ayarları
    Route::get('/header', [HeaderController::class, 'edit'])->name('admin.header.edit');
    Route::put('/header', [HeaderController::class, 'update'])->name('admin.header.update');

    // HomeHero rotaları
    Route::get('/home-hero', [HomeHeroController::class, 'index'])->name('admin.home-hero.index');
    Route::put('/home-hero/update', [HomeHeroController::class, 'update'])->name('admin.home-hero.update');

    // Translation rotaları
    Route::resource('translations', TranslationController::class)->names([
        'index' => 'admin.translations.index',
        'create' => 'admin.translations.create',
        'store' => 'admin.translations.store',
        'show' => 'admin.translations.show',
        'edit' => 'admin.translations.edit',
        'update' => 'admin.translations.update',
        'destroy' => 'admin.translations.destroy',
    ]);

    // HomeIncludes routes
    Route::get('/home-includes', [HomeIncludeController::class, 'index'])->name('admin.home-includes.index');
    Route::get('/home-includes/create', [HomeIncludeController::class, 'create'])->name('admin.home-includes.create');
    Route::post('/home-includes', [HomeIncludeController::class, 'store'])->name('admin.home-includes.store');
    Route::get('/home-includes/{id}/edit', [HomeIncludeController::class, 'edit'])->name('admin.home-includes.edit');
    Route::put('/home-includes/{id}', [HomeIncludeController::class, 'update'])->name('admin.home-includes.update');
    Route::delete('/home-includes/{id}', [HomeIncludeController::class, 'destroy'])->name('admin.home-includes.destroy');
    Route::get('/home-includes/status/{id}', [HomeIncludeController::class, 'status'])->name('admin.home-includes.status');
    Route::post('/home-includes/order', [HomeIncludeController::class, 'order'])->name('admin.home-includes.order');
    Route::post('/home-includes/toggle-status/{id}', [HomeIncludeController::class, 'toggleStatus'])->name('admin.home-includes.toggle-status');


    // SocialMedia rotaları
    Route::get('/social', [SocialMediaController::class, 'index'])->name('admin.social.index');
    Route::get('/social/create', [SocialMediaController::class, 'create'])->name('admin.social.create');
    Route::post('/social', [SocialMediaController::class, 'store'])->name('admin.social.store');
    Route::get('/social/{id}/edit', [SocialMediaController::class, 'edit'])->name('admin.social.edit');
    Route::put('/social/{id}', [SocialMediaController::class, 'update'])->name('admin.social.update');
    Route::delete('/social/{id}', [SocialMediaController::class, 'destroy'])->name('admin.social.destroy'); 

    Route::post('/social/order', [SocialMediaController::class, 'order'])->name('admin.social.order');
    Route::post('/social/toggle-status/{id}', [SocialMediaController::class, 'toggleStatus'])->name('admin.social.toggle-status');

    // HomeCart rotaları
    Route::get('/home-cart', [HomeCartController::class, 'index'])->name('admin.home-cart.index');
    Route::get('/home-cart/create', [HomeCartController::class, 'create'])->name('admin.home-cart.create');
    Route::post('/home-cart', [HomeCartController::class, 'store'])->name('admin.home-cart.store');
    Route::get('/home-cart/{id}/edit', [HomeCartController::class, 'edit'])->name('admin.home-cart.edit');
    Route::put('/home-cart/{id}', [HomeCartController::class, 'update'])->name('admin.home-cart.update');
    Route::delete('/home-cart/{id}', [HomeCartController::class, 'destroy'])->name('admin.home-cart.destroy');
    Route::get('/home-cart/status/{id}', [HomeCartController::class, 'status'])->name('admin.home-cart.status');
    Route::post('/home-cart/order', [HomeCartController::class, 'order'])->name('admin.home-cart.order');

    // Comment rotaları
    Route::get('/comment', [CommentController::class, 'index'])->name('admin.comment.index');
    Route::get('/comment/create', [CommentController::class, 'create'])->name('admin.comment.create');
    Route::post('/comment', [CommentController::class, 'store'])->name('admin.comment.store');
    Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->name('admin.comment.edit');
    Route::put('/comment/{id}', [CommentController::class, 'update'])->name('admin.comment.update');
    Route::get('/comment/status/{id}', [CommentController::class, 'status'])->name('admin.comment.status');
    Route::post('/comment/toggle-status/{id}', [CommentController::class, 'toggleStatus'])->name('admin.comment.toggle-status');
    Route::get('/comment/destroy/{id}', [CommentController::class, 'destroy'])->name('admin.comment.destroy');

    // ContactMessage rotaları
    Route::get('/contact-message', [ContactMessageController::class, 'index'])->name('admin.contact-message.index');
    Route::get('/contact-message/detail/{id}', [ContactMessageController::class, 'detail'])->name('admin.contact-message.detail');
    Route::delete('/contact-message/{id}', [ContactMessageController::class, 'destroy'])->name('admin.contact-message.destroy');
    Route::post('/contact-message/mark-as-read/{id}', [ContactMessageController::class, 'markAsRead'])->name('admin.contact-message.mark-as-read');
    Route::post('/contact-message/order', [ContactMessageController::class, 'order'])->name('admin.contact-message.order');
    Route::get('/contact-message/show/{id}', [ContactMessageController::class, 'show'])->name('admin.contact-message.show');
    Route::get('/contact-message/detail/{id}', [ContactMessageController::class, 'detail'])->name('admin.contact-message.detail');

    // ContactMessageData rotaları
    Route::resource('contact-messages-data', ContactMessageDataController::class)->names([
        'index' => 'admin.contact-messages-data.index',
        'create' => 'admin.contact-messages-data.create',
        'store' => 'admin.contact-messages-data.store',
        'show' => 'admin.contact-messages-data.show',
        'edit' => 'admin.contact-messages-data.edit',
        'update' => 'admin.contact-messages-data.update',
        'destroy' => 'admin.contact-messages-data.destroy',
    ]);

    Route::get('subscribe', [SubscribeController::class, 'index'])->name('admin.subscribe.index');
    Route::post('subscribe/{id}/change-status', [SubscribeController::class, 'changeStatus'])->name('admin.subscribe.change-status');
    Route::delete('subscribe/{id}', [SubscribeController::class, 'destroy'])->name('admin.subscribe.destroy');
    Route::post('subscribe', [SubscribeController::class, 'store'])->name('admin.subscribe.store');

    Route::resource('services', ServiceController::class)->names([
        'index' => 'admin.services.index',
        'create' => 'admin.services.create',
        'store' => 'admin.services.store',
        'edit' => 'admin.services.edit',
        'update' => 'admin.services.update',
        'destroy' => 'admin.services.destroy',
    ]);

    Route::post('services/toggle-status/{id}', [ServiceController::class, 'toggleStatus'])->name('admin.services.toggle-status');



    
    Route::get('courses/status/{id}', [CourseController::class, 'status'])->name('courses.status');

    // Define resource routes for courses within admin
    Route::resource('courses', \App\Http\Controllers\Admin\CourseController::class);

    // Define individual routes for AboutController
    Route::get('/about', [AboutController::class, 'index'])->name('abouts.index');
    Route::post('/about/update', [AboutController::class, 'update'])->name('abouts.update');
    Route::get('abouts/status/{id}', [AboutController::class, 'status'])->name('abouts.status');

    // ... any other admin routes ...




   
});

    // About Routes
    









