<?php

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

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('transaction')->group(function() {
        Route::get('/', 'TransactionController@index');
        Route::get('incomingWood/getTemplate', 'IncomingWoodController@getTemplate');
        Route::get('incomingWood/getNumberVehicle', 'IncomingWoodController@getNumberVehicle');
        Route::post('incomingWood/getTotal', 'IncomingWoodController@getTotal');
        Route::post('incomingWood/update', 'IncomingWoodController@update')->name('incomingWoods.update');
        Route::resource('incomingWoods', 'IncomingWoodController')->except(['update']);
        Route::get('incomingWoodTrade/getTemplate', 'IncomingWoodTradeController@getTemplate');
        Route::get('incomingWoodTrade/getNumberVehicle', 'IncomingWoodTradeController@getNumberVehicle');
        Route::post('incomingWoodTrade/getTotal', 'IncomingWoodTradeController@getTotal');
        Route::post('incomingWoodTrade/update', 'IncomingWoodTradeController@update')->name('incomingWoodTrades.update');
        Route::resource('incomingWoodTrades', 'IncomingWoodTradeController')->except(['update']);
    });

});