<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;

// Halaman Profil Sekolah (Landing Page)
Route::get('/', function () {
    return view('welcome');
});

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

require __DIR__ . '/auth.php';