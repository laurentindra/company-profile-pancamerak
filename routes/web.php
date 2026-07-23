<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminShipController;
use App\Http\Controllers\Admin\AdminScheduleController;

// Public Web Routes
Route::get('/', [CompanyProfileController::class, 'home'])->name('home');
Route::get('/about', [CompanyProfileController::class, 'about'])->name('about');
Route::get('/services', [CompanyProfileController::class, 'services'])->name('services');
Route::get('/schedules', [CompanyProfileController::class, 'schedules'])->name('schedules');
Route::get('/fleets', [CompanyProfileController::class, 'fleets'])->name('fleets');
Route::get('/fleets/{id}', [CompanyProfileController::class, 'fleetDetail'])->name('fleets.detail');
Route::get('/contact', [CompanyProfileController::class, 'contact'])->name('contact');
Route::post('/search-schedule', [CompanyProfileController::class, 'searchSchedule'])->name('search.schedule');

// Admin Authentication Routes
Route::get('/login', fn() => redirect()->route('admin.login'))->name('login');
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Protected Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Ships CRUD Management
    Route::resource('ships', AdminShipController::class);
    
    // Schedules CRUD Management
    Route::resource('schedules', AdminScheduleController::class);
});
