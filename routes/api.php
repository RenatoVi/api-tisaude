<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function ($router) {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login')->name('auth-login');
    });
});


Route::group(['middleware' => 'auth:api','prefix' => 'auth'], function ($router) {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/me', 'me')->name('auth-me');
    });
});
