<?php

use App\Http\Controllers\ShortenURLController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



Route::post('shorten', [ShortenURLController::class, 'shorten']);
Route::get('shorten/{shortCode}', [ShortenURLController::class, 'retrieve']);
Route::put('shorten/{shortCode}', [ShortenURLController::class, 'update']);
Route::delete('shorten/{shortCode}', [ShortenURLController::class, 'delete']);
Route::get('shorten/{shortCode}/stats', [ShortenURLController::class, 'getStatistics']);