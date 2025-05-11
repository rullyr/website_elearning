<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('reset', function () {
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');

    return 'done';
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
    Route::resource('kelas', \App\Http\Controllers\Admin\ClassController::class);
});
