<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'auth'
], function() {
    Route::post('/login', [AuthController::class, 'login']);
    // Route::post('/forget-password', [AuthController::class, 'login']);
    // Route::post('/send-password', [AuthController::class, 'login']);
});