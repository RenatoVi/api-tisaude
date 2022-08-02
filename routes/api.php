<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PlanoSaudeController;
use App\Http\Controllers\ProcedimentoController;
use App\Http\Controllers\VinculoController;
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

Route::group(['middleware' => 'auth:api','prefix' => 'especialidade'], function ($router) {
    Route::controller(EspecialidadeController::class)->group(function () {
        Route::post('/store', 'store')->name('especialidade-store');
        Route::get('/show/{especialidade}', 'show')->name('especialidade-show');
        Route::put('/update/{especialidade}', 'update')->name('especialidade-update');
        Route::delete('/destroy', 'destroy')->name('especialidade-destroy');
    });
});

Route::group(['middleware' => 'auth:api','prefix' => 'consulta'], function ($router) {
    Route::controller(ConsultaController::class)->group(function () {
        Route::post('/store', 'store')->name('consulta-store');
        Route::get('/show/{consulta}', 'show')->name('consulta-show');
        Route::put('/update/{consulta}', 'update')->name('consulta-update');
        Route::delete('/destroy', 'destroy')->name('consulta-destroy');
    });
});

Route::group(['middleware' => 'auth:api','prefix' => 'plano-saude'], function ($router) {
    Route::controller(PlanoSaudeController::class)->group(function () {
        Route::post('/store', 'store')->name('planoSaude-store');
        Route::get('/show/{planoSaude}', 'show')->name('planoSaude-show');
        Route::put('/update/{planoSaude}', 'update')->name('planoSaude-update');
        Route::delete('/destroy', 'destroy')->name('planoSaude-destroy');
    });
});

Route::group(['middleware' => 'auth:api','prefix' => 'procedimento'], function ($router) {
    Route::controller(ProcedimentoController::class)->group(function () {
        Route::post('/store', 'store')->name('procedimento-store');
        Route::get('/show/{procedimento}', 'show')->name('procedimento-show');
        Route::put('/update/{procedimento}', 'update')->name('procedimento-update');
        Route::delete('/destroy', 'destroy')->name('procedimento-destroy');
    });
});

Route::group(['middleware' => 'auth:api','prefix' => 'vinculo'], function ($router) {
    Route::controller(VinculoController::class)->group(function () {
        Route::post('/store', 'store')->name('vinculo-store');
        Route::get('/show/{vinculo}', 'show')->name('vinculo-show');
        Route::put('/update/{vinculo}', 'update')->name('vinculo-update');
        Route::delete('/destroy', 'destroy')->name('vinculo-destroy');
    });
});
