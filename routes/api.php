<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::prefix('logincontroller')->group(function () {
        Route::controller(\App\Http\Controllers\V1\LoginController::class)->group(function () {
            Route::post('/login', 'login');
        });
    });

});