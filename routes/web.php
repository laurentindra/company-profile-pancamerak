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

Route::get('/debug-db', function () {
    $paths = [
        base_path('database/database.sqlite'),
        '/var/task/database/database.sqlite',
        '/var/task/api/database/database.sqlite',
        realpath(base_path('database/database.sqlite')),
    ];
    $results = [];
    foreach ($paths as $path) {
        $results[$path] = file_exists($path) ? 'EXISTS' : 'NOT FOUND';
    }
    
    $results['scandir /var/task'] = is_dir('/var/task') ? scandir('/var/task') : 'NOT A DIR';
    if (is_dir('/var/task/database')) {
        $results['scandir /var/task/database'] = scandir('/var/task/database');
    }
    if (is_dir('/var/task/api')) {
        $results['scandir /var/task/api'] = scandir('/var/task/api');
    }
    
    return response()->json($results);
});
