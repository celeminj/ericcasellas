<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ContactController;
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


Route::post('/contact', [ContactController::class, 'send']);
Route::apiResource('/user', UserController::class);
Route::post('/register', [UserController::class, 'register']);


Route::post('/auth/login', [UserController::class, 'login']);



Route::apiResource('/album', AlbumController::class);

Route::post('/album', [AlbumController::class, 'store']);
Route::get('/album', [AlbumController::class, 'index']);
Route::get('/album/{album}', [AlbumController::class, 'show']);
Route::put('/album/{album}', [AlbumController::class, 'update']);
Route::delete('/album/{album}', [AlbumController::class, 'destroy']);


