<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;

// Halaman Profil Sekolah (Landing Page)
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/guru', [GuruController::class, 'index']);

    Route::get('/guru/create', [GuruController::class, 'create']);
    Route::post('/guru/store', [GuruController::class, 'store']);

    Route::get('/guru/edit/{id}', [GuruController::class, 'edit']);
    Route::put('/guru/update/{id}', [GuruController::class, 'update']);

    Route::post('/guru/delete/{id}', [GuruController::class, 'delete']);
});

Route::middleware('auth')->group(function () {

    Route::get('/siswa', [SiswaController::class, 'index']);

    Route::get('/siswa/create', [SiswaController::class, 'create']);
    Route::post('/siswa/store', [SiswaController::class, 'store']);

    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);
    Route::put('/siswa/update/{id}', [SiswaController::class, 'update']);

    Route::post('/siswa/delete/{id}', [SiswaController::class, 'delete']);

});



require __DIR__ . '/auth.php';