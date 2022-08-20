<?php

use App\Http\Controllers\{CategoryController, EventController, LandingPageController, ProductController, ProfileController, SettingController};
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


Route::get('/', [LandingPageController::class, 'index'])->name('welcome');
Route::get('galleries/{product}', [LandingPageController::class, 'show'])->name('product.galleries');
Route::middleware('auth')->group(function(){
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::resource('categories', CategoryController::class)->only('index', 'store', 'destroy', 'update');
    Route::resource('products', ProductController::class);
    Route::resource('schedules', EventController::class)->only('index', 'store');
    Route::resource('settings', SettingController::class)->only('index', 'store');
    Route::resource('profile', ProfileController::class)->only('index', 'store');
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::middleware('guest')->prefix('auth')->group(function(){
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);
});
