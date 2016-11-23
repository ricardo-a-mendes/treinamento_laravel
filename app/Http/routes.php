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
Route::get('/', 'StoreController@index')->name('home');
Route::get('category/{slug}', 'StoreController@showProductsFromCategory')->name('category.index');
//Route::pattern('id', '\d+');
Route::group(['prefix' => 'admin'], function(){

    #Categories
    Route::group(['prefix' => 'category'], function() {
        Route::get('', 'Admin\AdminCategoryController@index')->name('admin.category.index');
        Route::get('create', 'Admin\AdminCategoryController@create')->name('admin.category.create');
        Route::post('', 'Admin\AdminCategoryController@store')->name('admin.category.store');
        Route::get('{id}/edit', 'Admin\AdminCategoryController@edit')->name('admin.category.edit');
        Route::put('{id}/update', 'Admin\AdminCategoryController@update')->name('admin.category.update');
        Route::get('{id}/destroy', 'Admin\AdminCategoryController@destroy')->name('admin.category.destroy');
    });

    #Products
    Route::group(['prefix' => 'product'], function() {
        Route::get('', 'Admin\AdminProductController@index')->name('admin.product.index');
        Route::get('create', 'Admin\AdminProductController@create')->name('admin.product.create');
        Route::post('', 'Admin\AdminProductController@store')->name('admin.product.store');
        Route::get('{id}/edit', 'Admin\AdminProductController@edit')->name('admin.product.edit');
        Route::put('{id}/update', 'Admin\AdminProductController@update')->name('admin.product.update');
        Route::get('{id}/destroy', 'Admin\AdminProductController@destroy')->name('admin.product.destroy');

        Route::get('{id}/images', 'Admin\AdminProductController@images')->name('admin.product.image.index');
        Route::get('{id}/image/create', 'Admin\AdminProductController@createImage')->name('admin.product.image.create');
        Route::post('{id}/image/store', 'Admin\AdminProductController@storeImage')->name('admin.product.image.store');
        Route::get('{id}/image/destroy', 'Admin\AdminProductController@destroyImage')->name('admin.product.image.destroy');
        /*
        Route::group(['prefix' => 'images'], function() {

        });
        */
    });
});

Route::auth();

Route::get('/home', 'HomeController@index');
