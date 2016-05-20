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
    Route::get('category/edit/{id}', 'Admin\AdminCategoryController@edit')->name('categoryEdit');

    #Products
    Route::get('products', 'Admin\AdminProductController@index')->name('productList');
    Route::get('product/edit/{id}', 'Admin\AdminProductController@edit')->name('productEdit');
});
