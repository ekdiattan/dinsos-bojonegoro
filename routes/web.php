<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get( '/', [DashboardController::class, 'index']);
Route::get('/form', [FormController::class, 'index']);

Route::get('/layanan', function ()
{
    return view('layanan'); 
});

Route::group(['middleware' => 'auth'], function () 
{
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/datapertanyaan', [UserController::class, 'view']);
});

Route::post('/login', [AuthController::class, 'loginPost']);
Route::post('/register', [UserController::class, 'storeuser']);

Route::get('/admin', function ()
{
    return view('login');
});
