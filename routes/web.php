<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\HomeHeroController;









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
});
