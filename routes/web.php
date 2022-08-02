<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    \App\Models\User::query()->create([
//        'name' => 'Renato',
//        'email' => 'renato@gmail.com',
//        'password' => Hash::make('123456'),
//    ]);
    return view('welcome');
});
