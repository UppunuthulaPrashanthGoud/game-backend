<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\GameApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\AppSettingController;
use App\Http\Controllers\Admin\AuthController;

// Redirect root to admin dashboard for convenience
Route::get('/', function () {
    return redirect('/admin');
});

// Public API endpoint for games list
Route::get('/api/games', [GameApiController::class, 'index']);
// Public API endpoint for categories list
Route::get('/api/categories', [CategoryApiController::class, 'index']);

// Public legal/info pages
Route::view('/terms', 'public.terms');
Route::view('/privacy', 'public.privacy');
Route::view('/contact', 'public.contact');

// Admin panel routes
Route::prefix('admin')->name('admin.')->group(function () {
    // login routes
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // protected
    Route::middleware('admin.session')->group(function () {
        // /admin -> dashboard redirect
        Route::get('/', function () {
            return redirect()->route('admin.games.index');
        })->name('dashboard');
        Route::resource('categories', CategoryController::class);
        Route::resource('games', GameController::class);
        Route::post('games/{game}/toggle', [GameController::class, 'toggle'])->name('games.toggle');
        Route::post('categories/{category}/toggle', [CategoryController::class, 'toggle'])->name('categories.toggle');
        Route::get('settings', [AppSettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [AppSettingController::class, 'update'])->name('settings.update');
    });
});
