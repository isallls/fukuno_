<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\api\productController;
use App\Http\Controllers\api\userController;
use App\Http\Controllers\test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * route "/register"
 * @method "POST"
 */
Route::post('/register', [RegisterController::class, 'register'])->name('register');

/**
 * route "/login"
 * @method "POST"
 */
Route::post('/', function (Request $request) {
    return response()->json([
        'not losdfsdgin' => auth()->user(),
        'not login' => $request->user,
    ]);
});

Route::post('/login', [LoginController::class, 'login']);

/**
 * route "/user"
 * @method "GET"
 */
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return response()->json([
//         $request->user()
//     ]);
// });
Route::get('/', function () {
    return response()->json(
        [
            'status' => 'unauhorized',
        ],
        401,
    );
})->name('login');
Route::middleware('auth:api')->group(function () {
    Route::post('/user', function (Request $request) {
        return response()->json([$request->user()]);
    });
    Route::post('buy', [productController::class, 'buyProduct']);
    Route::get('cart',[userController::class,'cart']);
});

Route::post('/logout', LogoutController::class)->name('logout');
// Route::post('/logout'.)
?>
