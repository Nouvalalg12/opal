<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| SISWA
|--------------------------------------------------------------------------
*/
Route::get('/siswa', [AspirasiController::class, 'siswa']);
Route::post('/aspirasi', [AspirasiController::class, 'store']);

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin/konfirmasi/{id}', [AdminController::class, 'konfirmasi']);

// DELETE OLEH SISWA
Route::post('/aspirasi/hapus/{id}', [AspirasiController::class, 'hapusSiswa']);

// DELETE OLEH ADMIN
Route::post('/admin/hapus/{id}', [AdminController::class, 'hapus']);
