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
use App\Http\Controllers\Admin\LeaderController;
use App\Http\Controllers\Admin\CommentChatController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogTypeController;
use App\Http\Controllers\HomeController;








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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Header Ayarları
    Route::get('/header', [HeaderController::class, 'edit'])->name('header.edit');
    Route::put('/header', [HeaderController::class, 'update'])->name('header.update');

    // HomeHero rotaları
    Route::get('/home-hero', [HomeHeroController::class, 'index'])->name('home-hero.index');
    Route::put('/home-hero/update', [HomeHeroController::class, 'update'])->name('home-hero.update');

    // Translation rotaları
    Route::resource('translations', TranslationController::class)->names([
        'index' => 'translations.index',
        'create' => 'translations.create',
        'store' => 'translations.store',
        'show' => 'translations.show',
        'edit' => 'translations.edit',
        'update' => 'translations.update',
        'destroy' => 'translations.destroy',
    ]);

    // HomeIncludes routes
    Route::get('/home-includes', [HomeIncludeController::class, 'index'])->name('home-includes.index');
    Route::get('/home-includes/create', [HomeIncludeController::class, 'create'])->name('home-includes.create');
    Route::post('/home-includes', [HomeIncludeController::class, 'store'])->name('home-includes.store');
    Route::get('/home-includes/{id}/edit', [HomeIncludeController::class, 'edit'])->name('home-includes.edit');
    Route::put('/home-includes/{id}', [HomeIncludeController::class, 'update'])->name('home-includes.update');
    Route::delete('/home-includes/{id}', [HomeIncludeController::class, 'destroy'])->name('home-includes.destroy');
    Route::get('/home-includes/status/{id}', [HomeIncludeController::class, 'status'])->name('home-includes.status');
    Route::post('/home-includes/order', [HomeIncludeController::class, 'order'])->name('home-includes.order');
    Route::post('/home-includes/toggle-status/{id}', [HomeIncludeController::class, 'toggleStatus'])->name('home-includes.toggle-status');


    // SocialMedia rotaları
    Route::get('/social', [SocialMediaController::class, 'index'])->name('social.index');
    Route::get('/social/create', [SocialMediaController::class, 'create'])->name('social.create');
    Route::post('/social', [SocialMediaController::class, 'store'])->name('social.store');
    Route::get('/social/{id}/edit', [SocialMediaController::class, 'edit'])->name('social.edit');
    Route::put('/social/{id}', [SocialMediaController::class, 'update'])->name('social.update');
    Route::delete('/social/{id}', [SocialMediaController::class, 'destroy'])->name('social.destroy'); 

    Route::post('/social/order', [SocialMediaController::class, 'order'])->name('social.order');
    Route::post('/social/toggle-status/{id}', [SocialMediaController::class, 'toggleStatus'])->name('social.toggle-status');

    // HomeCart rotaları
    Route::get('/home-cart', [HomeCartController::class, 'index'])->name('home-cart.index');
    Route::get('/home-cart/create', [HomeCartController::class, 'create'])->name('home-cart.create');
    Route::post('/home-cart', [HomeCartController::class, 'store'])->name('home-cart.store');
    Route::get('/home-cart/{id}/edit', [HomeCartController::class, 'edit'])->name('home-cart.edit');
    Route::put('/home-cart/{id}', [HomeCartController::class, 'update'])->name('home-cart.update');
    Route::delete('/home-cart/{id}', [HomeCartController::class, 'destroy'])->name('home-cart.destroy');
    Route::get('/home-cart/status/{id}', [HomeCartController::class, 'status'])->name('home-cart.status');
    Route::post('/home-cart/order', [HomeCartController::class, 'order'])->name('home-cart.order');

    // Comment rotaları
    Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
    Route::get('/comment/create', [CommentController::class, 'create'])->name('comment.create');
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::put('/comment/{id}', [CommentController::class, 'update'])->name('comment.update');
    Route::get('/comment/status/{id}', [CommentController::class, 'status'])->name('comment.status');
    Route::post('/comment/toggle-status/{id}', [CommentController::class, 'toggleStatus'])->name('comment.toggle-status');
    Route::get('/comment/destroy/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

    // ContactMessage rotaları
    Route::get('/contact-message', [ContactMessageController::class, 'index'])->name('contact-message.index');
    Route::get('/contact-message/detail/{id}', [ContactMessageController::class, 'detail'])->name('contact-message.detail');
    Route::delete('/contact-message/{id}', [ContactMessageController::class, 'destroy'])->name('contact-message.destroy');
    Route::post('/contact-message/mark-as-read/{id}', [ContactMessageController::class, 'markAsRead'])->name('contact-message.mark-as-read');
    Route::post('/contact-message/order', [ContactMessageController::class, 'order'])->name('contact-message.order');
    Route::get('/contact-message/show/{id}', [ContactMessageController::class, 'show'])->name('contact-message.show');
    Route::get('/contact-message/detail/{id}', [ContactMessageController::class, 'detail'])->name('contact-message.detail');

    // ContactMessageData rotaları
    Route::resource('contact-messages-data', ContactMessageDataController::class)->names([
        'index' => 'contact-messages-data.index',
        'create' => 'contact-messages-data.create',
        'store' => 'contact-messages-data.store',
        'show' => 'contact-messages-data.show',
        'edit' => 'contact-messages-data.edit',
        'update' => 'contact-messages-data.update',
        'destroy' => 'contact-messages-data.destroy',
    ]);

    Route::get('subscribe', [SubscribeController::class, 'index'])->name('subscribe.index');
    Route::post('subscribe/{id}/change-status', [SubscribeController::class, 'changeStatus'])->name('subscribe.change-status');
    Route::delete('subscribe/{id}', [SubscribeController::class, 'destroy'])->name('subscribe.destroy');
    Route::post('subscribe', [SubscribeController::class, 'store'])->name('subscribe.store');

    Route::resource('services', ServiceController::class)->names([
        'index' => 'services.index',
        'create' => 'services.create',
        'store' => 'services.store',
        'edit' => 'services.edit',
        'update' => 'services.update',
        'destroy' => 'services.destroy',
    ]);

    Route::post('services/toggle-status/{id}', [ServiceController::class, 'toggleStatus'])->name('services.toggle-status');



    
    Route::get('courses/status/{id}', [CourseController::class, 'status'])->name('courses.status');

    // Define resource routes for courses within admin
    Route::resource('courses', \App\Http\Controllers\Admin\CourseController::class);

    // Define individual routes for AboutController
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::post('/about/update', [AboutController::class, 'update'])->name('about.update');
    Route::get('abouts/status/{id}', [AboutController::class, 'status'])->name('about.status');
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::post('/about/update', [AboutController::class, 'update'])->name('about.update');
    Route::get('abouts/status/{id}', [AboutController::class, 'status'])->name('about.status');

    // ... any other admin routes ...

    Route::resource('leaders', LeaderController::class)->names([
        'index' => 'leaders.index',
        'create' => 'leaders.create',
        'store' => 'leaders.store',
        'edit' => 'leaders.edit',
        'update' => 'leaders.update',
        'destroy' => 'leaders.destroy',
    ]); 

    Route::put('/admin/leaders/{id}', [LeaderController::class, 'update'])->name('admin.leaders.update');

    Route::resource('comment_chat', CommentChatController::class)->names([
        'index' => 'comment_chat.index',
        'create' => 'comment_chat.create',
        'store' => 'comment_chat.store',
        'show' => 'comment_chat.show',
        'edit' => 'comment_chat.edit',
        'update' => 'comment_chat.update',
        'destroy' => 'comment_chat.destroy',
    ]);

    Route::resource('blogs', BlogController::class);
    Route::post('blogs/toggle-status/{id}', [BlogController::class, 'toggleStatus'])->name('blogs.toggle-status');

    Route::resource('blog_types', BlogTypeController::class);

});

    // About Routes
    

Route::delete('/admin/courses/{id}', [CourseController::class, 'destroy'])->name('admin.courses.destroy');

// Frontend comment submission route
Route::post('/comments', [CommentChatController::class, 'store'])->name('frontend.comments.store');

Route::get('/', [HomeController::class, 'index']);
    