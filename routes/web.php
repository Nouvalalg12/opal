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

Route::get('/siswa', function () {
    return view('siswa');
});

Route::post('/aspirasi', [AspirasiController::class, 'store']);

Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin/konfirmasi/{id}', [AdminController::class, 'konfirmasi']);
