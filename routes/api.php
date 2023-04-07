<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselItemsController;
use App\Http\Controllers\Api\UserResourceController;
use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/carousels', [CarouselItemsController::class, 'index']);
Route::get('/carousels/{id}', [CarouselItemsController::class, 'show']);
Route::post('/carousels', [CarouselItemsController::class, 'store']);
Route::put('/carousels/{id}', [CarouselItemsController::class, 'update']);
Route::delete('/carousels/{id}', [CarouselItemsController::class, 'destroy']);
Route::get('activity/', [UserResourceController::class, 'index']);
Route::delete('/activity/{id}', [UserResourceController::class, 'destroy']);

Route::get('/user', [UserController::class, 'index']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::put('/user/email/{id}', [UserController::class, 'email'])->name('user.email');
Route::put('/user/password/{id}', [UserController::class, 'password'])->name('user.password');