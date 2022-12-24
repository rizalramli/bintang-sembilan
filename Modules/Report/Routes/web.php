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

Route::prefix('report')->group(function() {
    Route::get('/', 'ReportController@index');
    Route::get('incomingWoods/excel', 'IncomingWoodController@excel');
    Route::get('incomingWoods', 'IncomingWoodController@index');
    Route::get('salaries/excel', 'SalaryController@excel');
    Route::get('salaries', 'SalaryController@index');
    Route::get('income/excel', 'IncomeController@excel');
    Route::get('income', 'IncomeController@index');
    Route::get('expense/excel', 'ExpenseController@excel');
    Route::get('expense', 'ExpenseController@index');
    Route::get('profit_loss/excel', 'ProfitLossController@excel');
    Route::get('profit_loss', 'ProfitLossController@index');
});
