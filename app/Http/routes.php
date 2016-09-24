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

//Route::pattern('id', '\d+');
Route::group(['prefix' => 'admin'], function(){

    #Categories
    Route::group(['prefix' => 'categories'], function() {

        Route::get('/', 'Admin\AdminCategoryController@index')->name('categoryList');
        Route::post('/', 'Admin\AdminCategoryController@create')->name('categoryCreate');
        Route::put('update/{id}', 'Admin\AdminCategoryController@update')->name('categoryUpdate');
        Route::get('add', 'Admin\AdminCategoryController@add')->name('categoryAdd');
        Route::get('edit/{id}', 'Admin\AdminCategoryController@edit')->name('categoryEdit');
        Route::get('delete/{id}', 'Admin\AdminCategoryController@delete')->name('categoryDelete');
    });

    #Products
    Route::group(['prefix' => 'products'], function() {
        Route::get('/', 'Admin\AdminProductController@index')->name('productList');
        Route::post('/', 'Admin\AdminProductController@create')->name('productCreate');
        Route::put('update/{id}', 'Admin\AdminProductController@update')->name('productUpdate');
        Route::get('add', 'Admin\AdminProductController@add')->name('productAdd');
        Route::get('edit/{id}', 'Admin\AdminProductController@edit')->name('productEdit');
        Route::get('delete/{id}', 'Admin\AdminProductController@delete')->name('productDelete');

        Route::get('{id}/images', 'Admin\AdminProductController@images')->name('productImages');
        Route::get('{id}/image/create', 'Admin\AdminProductController@createImage')->name('productImagesCreate');
        Route::post('{id}/image/store', 'Admin\AdminProductController@storeImage')->name('productImagesStore');
        /*
        Route::group(['prefix' => 'images'], function() {

        });
        */
    });
});
