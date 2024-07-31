<?php

use App\Http\Controllers\userController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\procutController;
use Illuminate\Support\Facades\Route;

Route::middleware('notLogin')->group(function () {
    Route::get('/login', [dashboardController::class, 'login']);
    Route::post('actionlogin', [loginController::class, 'actionLogin'])->name('actionlogin');
    Route::get('/', function () {
        return view('dashboard.login');
    });
});

Route::middleware('isLogin')->group(function () {
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/update-item/{product}', [dashboardController::class, 'updateItem'])->name('updateItem');
    Route::get('/add-item', [dashboardController::class, 'addProduct'])->name('addItem');
    Route::get('/logout', [userController::class, 'logout']);
    Route::resource('/item', procutController::class);
    Route::get('/test',function(){
        return view('test');
    });
});
