<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::middleware(['auth:api', 'role'])->group(function() {

    Route::middleware(['scope:Administrador'])->group(function () {

    });

    Route::middleware(['scope:Usuario'])->group(function () {

    });
});
