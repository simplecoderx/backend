<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselItemsController;
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
Route::delete('/carousels/{id}', [CarouselItemsController::class, 'destroy']);
Route::post('/carousels', [CarouselItemsController::class, 'store']);