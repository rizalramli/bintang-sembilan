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
    
    Route::prefix('master')->group(function() {
        Route::get('/', 'MasterController@index');
        Route::resource('products', 'ProductController');
        Route::resource('templateWoods', 'TemplateWoodController');
        Route::resource('woodCategories', 'WoodCategoryController');
        Route::resource('woodSizes', 'WoodSizeController');
        Route::resource('woodTypes', 'WoodTypeController');
        Route::resource('woodTypeOuts', 'WoodTypeOutController');
        Route::resource('employees', 'EmployeeController');
        Route::resource('customers', 'CustomerController');
        Route::resource('suppliers', 'SupplierController');
        Route::resource('warehouses', 'WarehouseController');
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        Route::resource('companies', 'CompanyController');
    });

});