<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    // Publikasi
    Route::get('/publikasi', [PublikasiController::class, 'index']);
    Route::post('/publikasi', [PublikasiController::class, 'store']);
    Route::get('/publikasi/{id}', [PublikasiController::class, 'show']);
    Route::put('/publikasi/{id}', [PublikasiController::class, 'update']); // Edit publikasi
    Route::delete('/publikasi/{id}', [PublikasiController::class, 'destroy']); // Hapus publikasi


    // User info
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
