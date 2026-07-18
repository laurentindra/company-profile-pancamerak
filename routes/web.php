<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyProfileController;

Route::get('/', [CompanyProfileController::class, 'home'])->name('home');
Route::get('/about', [CompanyProfileController::class, 'about'])->name('about');
Route::get('/services', [CompanyProfileController::class, 'services'])->name('services');
Route::get('/schedules', [CompanyProfileController::class, 'schedules'])->name('schedules');
Route::get('/fleets', [CompanyProfileController::class, 'fleets'])->name('fleets');
Route::get('/fleets/{id}', [CompanyProfileController::class, 'fleetDetail'])->name('fleets.detail');
Route::get('/contact', [CompanyProfileController::class, 'contact'])->name('contact');
Route::post('/search-schedule', [CompanyProfileController::class, 'searchSchedule'])->name('search.schedule');
