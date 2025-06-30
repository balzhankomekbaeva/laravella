<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth:sanctum');


//Route::get('/books', [BookController::class, 'index']);
//Route::get('/books/{id}', [BookController::class, 'show']);
//Route::post('/books', [BookController::class, 'store']);
//Route::patch('/books/{id}', [BookController::class, 'update']);
//Route::delete('/books/{id}', [BookController::class, 'destroy']);
