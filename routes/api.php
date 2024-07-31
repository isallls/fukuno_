<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\api\productController;
use App\Http\Controllers\api\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/products', [productController::class, 'products']);

Route::get('/', function () {
    return response()->json(
        [
            'status' => 'unauhorized awiksok',
        ],
        401,
    );
})->name('login');
Route::middleware('auth:api')->group(function () {
    Route::get('/user', [userController::class, 'user']);
    Route::post('buy', [productController::class, 'buyProduct']);
    Route::get('cart', [userController::class, 'cart']);
    Route::get('/logout', LogoutController::class)->name('logout');
});
?>
