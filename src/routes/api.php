<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/user/{id}/edit', [UserController::class, 'show']);
Route::get('/groups', [UserController::class, 'getGroups']);
Route::put('/user/{id}', [UserController::class, 'update']);
