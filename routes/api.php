<?php

use App\Http\Controllers\{AuthController, UserController};
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'create']);

Route::group([
    'prefix' => 'auth'
], function() {
    Route::post('/login', [AuthController::class, 'login']);
    // Route::post('/forget-password', [AuthController::class, 'login']);
    // Route::post('/send-password', [AuthController::class, 'login']);
});

Route::middleware('jwt.verify')->group(function() {
    Route::post('/users/{id}/deposits', [UserController::class, 'deposit']);

});