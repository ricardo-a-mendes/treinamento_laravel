<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::pattern('id', '\d+');
Route::group(['prefix' => 'admin'], function(){

    #Categories
    Route::get('categories', 'Admin\AdminCategoryController@index')->name('categoryList');
    Route::post('category', 'Admin\AdminCategoryController@create')->name('categoryCreate');
    Route::put('category/update/{id}', 'Admin\AdminCategoryController@update')->name('categoryUpdate');
    Route::get('category/add', 'Admin\AdminCategoryController@add')->name('categoryAdd');
    Route::get('category/edit/{id}', 'Admin\AdminCategoryController@edit')->name('categoryEdit');
    Route::get('category/delete/{id}', 'Admin\AdminCategoryController@delete')->name('categoryDelete');

    #Products
    Route::get('products', 'Admin\AdminProductController@index')->name('productList');
    Route::post('product', 'Admin\AdminProductController@create')->name('productCreate');
    Route::put('product/update/{id}', 'Admin\AdminProductController@update')->name('productUpdate');
    Route::get('product/add', 'Admin\AdminProductController@add')->name('productAdd');
    Route::get('product/edit/{id}', 'Admin\AdminProductController@edit')->name('productEdit');
    Route::get('product/delete/{id}', 'Admin\AdminProductController@delete')->name('productDelete');
});
