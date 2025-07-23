<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use packages\Controllers\Controllers\Users\FindUserController;
use packages\Controllers\Controllers\Users\UpdateUserController;
use packages\Controllers\Controllers\Users\DeleteUserController;
use packages\Controllers\Controllers\Users\IndexUserController;
use packages\Controllers\Controllers\Groups\GetGroupController;

// 認証不要のルート
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// 認証が必要なルート
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    // 認証済みユーザ情報の取得
    Route::get('/getLoginUserInfo', [AuthController::class, 'getLoginUserInfo']);
    // ユーザ一覧の取得
    Route::get('/users', IndexUserController::class);
    // ユーザ情報の取得
    Route::get('/users/{id}', FindUserController::class);
    // ユーザ情報の削除
    Route::delete('/users/{id}', DeleteUserController::class);
    // グループ一覧の取得
    Route::get('/groups', GetGroupController::class);
    // ユーザ情報の更新
    Route::put('/users/{id}', UpdateUserController::class);
    // ユーザ情報の作成
    Route::post('/users', [UserController::class, 'create']);
});
