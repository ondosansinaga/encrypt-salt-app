<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [\App\Http\Controllers\AuthController::class, 'login'])->name('admin.login');
Route::post('/', [\App\Http\Controllers\AuthController::class, 'attempt'])->name('admin.attempt');

Route::middleware('admin')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');


        Route::get('/gaji', [\App\Http\Controllers\AdminController::class, 'gaji'])->name('gaji');
        Route::get('/tunjangan', [\App\Http\Controllers\AdminController::class, 'tunjangan'])->name('tunjangan');
        Route::get('/jabatan', [\App\Http\Controllers\AdminController::class, 'jabatan'])->name('jabatan');
        Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    });

    Route::prefix('karyawan')->name('karyawan.')->group(function () {
        Route::get('/', [\App\Http\Controllers\KaryawanController::class, 'index'])->name('index');
        Route::post('/login', [\App\Http\Controllers\KaryawanController::class, 'login'])->name('login');
        Route::post('/store', [\App\Http\Controllers\KaryawanController::class, 'store'])->name('store');
        Route::get('/show/{id}', [\App\Http\Controllers\KaryawanController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [\App\Http\Controllers\KaryawanController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [\App\Http\Controllers\KaryawanController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [\App\Http\Controllers\KaryawanController::class, 'destroy'])->name('delete');
    });

    Route::prefix('perizinan')->name('perizinan.')->group(function () {
        Route::get('/{id}', [\App\Http\Controllers\PerizinanController::class, 'index'])->name('index');
        Route::post('/store', [\App\Http\Controllers\PerizinanController::class, 'store'])->name('store');
    });
});