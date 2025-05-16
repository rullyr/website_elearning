<?php

use App\Models\Kelas;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Eloquent\Builder;


Route::get('reset', function () {
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');

    return 'done';
});

Route::get('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('register', [\App\Http\Controllers\AuthController::class, 'actionRegister'])->name('actionregister');
Route::post('actionlogin', [\App\Http\Controllers\AuthController::class, 'actionlogin'])->name('actionlogin');
Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/', \App\Http\Controllers\LandingPageController::class)->name('landing-page');

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/kelas/{id}', [\App\Http\Controllers\ClassController::class, 'index'])->name('kelas.index');
    Route::post('/kelas/{id}/submit', [\App\Http\Controllers\ClassController::class, 'submit'])->name('kelas.submit');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
    Route::resource('kelas', \App\Http\Controllers\Admin\ClassController::class);

    Route::get('user', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
    Route::get('user/{id}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('user.show');
    Route::delete('user/{id}', [\App\Http\Controllers\Admin\UserController::class, 'delete'])->name('user.delete');

    Route::get('materi/tambah/{id}', [\App\Http\Controllers\Admin\MaterialController::class, 'create'])->name('material.create');
    Route::post('materi/tambah/{id}', [\App\Http\Controllers\Admin\MaterialController::class, 'store'])->name('material.store');
    Route::get('materi/edit/{id}', [\App\Http\Controllers\Admin\MaterialController::class, 'edit'])->name('material.edit');
    Route::put('materi/edit/{id}', [\App\Http\Controllers\Admin\MaterialController::class, 'update'])->name('material.update');
    Route::delete('materi/{id}', [\App\Http\Controllers\Admin\MaterialController::class, 'delete'])->name('material.delete');

    Route::get('quiz/tambah/{id}', [\App\Http\Controllers\Admin\QuizController::class, 'create'])->name('quiz.create');
    Route::post('quiz/tambah/{id}', [\App\Http\Controllers\Admin\QuizController::class, 'store'])->name('quiz.store');
    Route::get('quiz/edit/{id}', [\App\Http\Controllers\Admin\QuizController::class, 'edit'])->name('quiz.edit');
    Route::put('quiz/edit/{id}', [\App\Http\Controllers\Admin\QuizController::class, 'update'])->name('quiz.update');
    Route::delete('quiz/{id}', [\App\Http\Controllers\Admin\QuizController::class, 'delete'])->name('quiz.delete');

    Route::get('pilih-kelas/{category}', function ($category) {
        if (!in_array($category, ['materi', 'quiz'])) {
            abort(404); // hanya izinkan dua kategori ini
        }

        $type_menu = $category === 'materi' ? 'material-create' : 'quiz-create';

        $class = $category === 'materi'
            ? Kelas::where('is_tryout', 0)->get()
            : Kelas::all(); // quiz: tampilkan semua kelas

        return view('admin.pages.class-option', [
            'category' => $category,
            'type_menu' => $type_menu,
            'class' => $class,
        ]);
    })->name('class-option');
});
