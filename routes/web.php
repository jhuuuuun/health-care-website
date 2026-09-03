<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/packages', function () {
    return view('packages.index');
})->name('packages.index');

Route::get('/news', function () {
    return view('news.index');
})->name('news.index');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/appointments/create', function () {
    return view('appointments.create');
})->name('appointments.create');


/*
|--------------------------------------------------------------------------
| Service Routes
|--------------------------------------------------------------------------
*/

Route::get('/services', [ServiceController::class, 'index'])
    ->name('services.index');

Route::get('/services/{slug}', [ServiceController::class, 'show'])
    ->name('services.show');


/*
|--------------------------------------------------------------------------
| Doctor Routes
|--------------------------------------------------------------------------
*/

Route::get('/doctors', [DoctorController::class, 'index'])
    ->name('doctors.index');

Route::get('/doctors/{slug}', [DoctorController::class, 'show'])
    ->name('doctors.show');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/admin', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin/doctors', [AdminDoctorController::class, 'index'])
        ->name('admin.doctors.index');

    Route::get('/admin/doctors/create', [AdminDoctorController::class, 'create'])
        ->name('admin.doctors.create');

    Route::post('/admin/doctors', [AdminDoctorController::class, 'store'])
        ->name('admin.doctors.store');

    Route::get('/admin/doctors/{doctor}', [AdminDoctorController::class, 'show'])
        ->name('admin.doctors.show');

    Route::get('/admin/doctors/{doctor}/edit', [AdminDoctorController::class, 'edit'])
        ->name('admin.doctors.edit');

    Route::put('/admin/doctors/{doctor}', [AdminDoctorController::class, 'update'])
        ->name('admin.doctors.update');

    Route::delete('/admin/doctors/{doctor}', [AdminDoctorController::class, 'destroy'])
        ->name('admin.doctors.destroy');
});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';