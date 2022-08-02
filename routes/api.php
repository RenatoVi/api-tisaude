<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
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

Route::group(['middleware' => 'auth:api','prefix' => 'paciente'], function ($router) {
    Route::controller(PacienteController::class)->group(function () {
        Route::post('/store', 'store')->name('paciente-store');
        Route::get('/show/{paciente}', 'show')->name('paciente-show');
        Route::put('/update/{paciente}', 'update')->name('paciente-update');
        Route::delete('/destroy', 'destroy')->name('paciente-destroy');
    });
});

Route::group(['middleware' => 'auth:api','prefix' => 'medico'], function ($router) {
    Route::controller(MedicoController::class)->group(function () {
        Route::post('/store', 'store')->name('medico-store');
        Route::get('/show/{medico}', 'show')->name('medico-show');
        Route::put('/update/{medico}', 'update')->name('medico-update');
        Route::delete('/destroy', 'destroy')->name('medico-destroy');
    });
});
