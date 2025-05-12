<?php

use App\Http\Controllers\Admin\MaterialController;
use App\Models\Kelas;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Eloquent\Builder;

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

    Route::get('user', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
    Route::get('user/{id}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('user.show');
    Route::delete('user/{id}', [\App\Http\Controllers\Admin\UserController::class, 'delete'])->name('user.delete');

    // Route::resource('materi', \App\Http\Controllers\Admin\MaterialController::class);
    Route::get('materi/tambah/{id}', [\App\Http\Controllers\Admin\MaterialController::class, 'create'])->name('material.create');
    Route::post('materi/tambah/{id}', [\App\Http\Controllers\Admin\MaterialController::class, 'store'])->name('material.store');
    Route::get('materi/edit/{id}', [\App\Http\Controllers\Admin\MaterialController::class, 'edit'])->name('material.edit');
    Route::put('materi/edit/{id}', [\App\Http\Controllers\Admin\MaterialController::class, 'update'])->name('material.update');
    Route::delete('materi/{id}', [\App\Http\Controllers\Admin\MaterialController::class, 'delete'])->name('material.delete');

    Route::get('pilih-kelas/{category}', function ($category) {
        if (!in_array($category, ['materi', 'quiz'])) {
            abort(404); // hanya izinkan dua kategori ini
        }

        $type_menu = $category === 'materi' ? 'material-create' : 'quiz-create';

        $class = Kelas::where('is_tryout', $category === 'quiz' ? 1 : 0)->get();

        return view('admin.pages.class-option', [
            'category' => $category,
            'type_menu' => $type_menu,
            'class' => $class,
        ]);
    })->name('class-option');
});
