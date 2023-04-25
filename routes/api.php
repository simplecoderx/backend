<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselItemsController;
use App\Http\Controllers\Api\UserResourceController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MessagesController;
use App\Http\Controllers\Api\ProfileController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::controller(AuthController::class)->group(function () {
//     Route::post('/login', 'login')->name('user.login');
//     Route::post('/logout', 'logout');
// });

Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/user', [UserController::class, 'store'])->name('user.store');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::controller(CarouselItemsController::class)->group(function () {
        Route::get('/carousels',             'index');
        Route::get('/carousels/{id}',        'show');
        Route::post('/carousels',            'store');
        Route::put('/carousels/{id}',        'update');
        Route::delete('/carousels/{id}',     'destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/user',                 'index');
        Route::get('/user/{id}',            'show');
        Route::put('/user/{id}',            'update')->name('user.update');
        Route::put('/user/email/{id}',      'email')->name('user.email');
        Route::put('/user/password/{id}',   'password')->name('user.password');
        Route::put('/user/image/{id}',   'image')->name('user.image');
        Route::delete('/user/{id}',         'destroy');
    });

    //User Specific API's
        Route::get('/profile/show', [ProfileController::class, 'show']);
        Route::put('/profile/image', [ProfileController::class, 'image'])->name('profile.image');
});
 
// Route::controller(CarouselItemsController::class)->group(function () {
//     Route::get('/carousel',             'index');
//     Route::get('/carousel/{id}',        'show');
//     Route::post('/carousel',            'store');
//     Route::put('/carousel/{id}',        'update');
//     Route::delete('/carousel/{id}',     'destroy');
// });

// Route::get('/carousels', [CarouselItemsController::class, 'index']);
// Route::get('/carousels/{id}', [CarouselItemsController::class, 'show']);
// Route::post('/carousels', [CarouselItemsController::class, 'store']);
// Route::put('/carousels/{id}', [CarouselItemsController::class, 'update']);
// Route::delete('/carousels/{id}', [CarouselItemsController::class, 'destroy']);
// Route::get('activity/', [UserResourceController::class, 'index']);
// Route::delete('/activity/{id}', [UserResourceController::class, 'destroy']);

// Route::get('/user', [UserController::class, 'index']);
// Route::delete('/user/{id}', [UserController::class, 'destroy']);
// Route::get('/user/{id}', [UserController::class, 'show']);
// Route::post('/user', [UserController::class, 'store'])->name('user.store');
// Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
// Route::put('/user/email/{id}', [UserController::class, 'email'])->name('user.email');
// Route::put('/user/password/{id}', [UserController::class, 'password'])->name('user.password');

Route::get('/message', [MessagesController::class, 'index']);
Route::post('/message', [MessagesController::class, 'store']);
Route::put('/message/{id}', [MessagesController::class, 'update']);


