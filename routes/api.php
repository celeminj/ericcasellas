<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PictureController;
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




Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');
Route::get('/album', [AlbumController::class, 'index']);
Route::get('/album/paginate', [AlbumController::class, 'paginate']);
Route::get('/album/{album}', [AlbumController::class, 'show']);
Route::put('/album/{album}', [AlbumController::class, 'update']);
Route::delete('/album/{album}', [AlbumController::class, 'destroy']);
Route::get('/album/{id}/pictures', [AlbumController::class, 'getPicturesByAlbumId']);


Route::post('/pictures', [PictureController::class, 'store'])->name('pictures.store');
Route::get('/pictures', [PictureController::class, 'index']);
Route::get('/picture/paginate', [PictureController::class, 'paginate']);
Route::get('/picture/{picture}', [PictureController::class, 'show']);
Route::put('/picture/{picture}', [PictureController::class, 'update']);
Route::delete('/picture/{picture}', [PictureController::class, 'destroy']);
