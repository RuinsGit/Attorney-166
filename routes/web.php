<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\HomeHeroController;
use App\Http\Controllers\Admin\TranslationController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\HomeCartController;








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
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
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

    // SocialMedia rotaları
    Route::get('/social', [SocialMediaController::class, 'index'])->name('admin.social.index');
    Route::get('/social/create', [SocialMediaController::class, 'create'])->name('admin.social.create');
    Route::post('/social', [SocialMediaController::class, 'store'])->name('admin.social.store');
    Route::get('/social/{id}/edit', [SocialMediaController::class, 'edit'])->name('admin.social.edit');
    Route::put('/social/{id}', [SocialMediaController::class, 'update'])->name('admin.social.update');
    Route::delete('/social/{id}', [SocialMediaController::class, 'destroy'])->name('admin.social.destroy'); 
});

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




