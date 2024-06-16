<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get( '/', [DashboardController::class, 'index']);
Route::get('/form', [FormController::class, 'index']);

Route::get('/layanan', function ()
{
    return view('layanan'); 
});


Route::get('/login', function ()
{
    return view('login');
});
