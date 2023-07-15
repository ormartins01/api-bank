<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'create']);

Route::middleware('jwt.verify')->group(function() {
    Route::post('/users/{id}/deposits', [UserController::class, 'deposit']);

});
