<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard',[dashboardController::class,'index']);
Route::get('/login',[dashboardController::class,'login']);
Route::post('actionlogin',[loginController::class,'actionLogin'])->name('actionlogin');
