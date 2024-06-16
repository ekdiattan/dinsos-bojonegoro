<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PertanyaanController;

// Public
Route::get( '/', [DashboardController::class, 'index']);

Route::post('/login', [AuthController::class, 'loginPost']);
Route::get('/admin', [AuthController::class, 'view']);

Route::post('/register', [UserController::class, 'storeuser']);

Route::get('/form', [FormController::class, 'index']);
Route::post('/formsurvey', [FormController::class, 'store']);

Route::get('/layanan',[ LayananController::class,'view']);

// Admin
Route::group(['middleware' => 'auth'], function () 
{
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard']);

    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/datauser', [UserController::class, 'view']);

    Route::get('/datapertanyaan', [PertanyaanController::class, 'view']);
});

