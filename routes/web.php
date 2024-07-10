<?php

use App\Http\Controllers\userController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.login');
});


Route::post('actionlogin',[loginController::class,'actionLogin'])->name('actionlogin');
Route::get('/login',[dashboardController::class,'login']);

Route::middleware('isLogin')->group(function(){
    Route::get('/dashboard',[dashboardController::class,'index'])->name('dashboard');
    Route::post('/logout',[userController::class,'logout']);
});