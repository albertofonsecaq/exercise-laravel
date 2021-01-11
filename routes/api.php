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
/** point B */
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::middleware(['auth:api', 'role'])->group(function() {

    Route::middleware(['scope:Administrador'])->group(function () {

        /** point A */
        Route::get('usuarios', 'UserController@index');
        Route::get('lista_usuarios', 'UserController@listUsers')->name('users.list');
        Route::get('ordenes', 'PurchaseOrderController@index');
        Route::get('lista_ordenes', 'PurchaseOrderController@listOrders')->name('orders.list');

        /** point D*/
        Route::get('usuarios-direcciones', 'UserController@usersWithAddress')->name('users.with.address');
        Route::get('ordenes-usuario', 'PurchaseOrderController@getOrdersWithUser')->name('orders.with.user');
        Route::get('productos', 'ProductController@allProduct')->name('all.product');
    });

    /** C */
    Route::get('usuario/{id}', 'UserController@show');
    Route::get('usuario/{id}/ordenes', 'PurchaseOrderController@getOrdersByUser');
    Route::get('usuario/{id}/direcciones', 'AddressController@getAddressByUser');


    /** Api extern */
    Route::post('api_extern', 'ApiExternalController@store');
    Route::post('lista_datos_api_extern', 'ApiExternalController@listData');

    Route::middleware(['scope:Usuario'])->group(function () {

    });
});
