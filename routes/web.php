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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('admin', 'Admin\ProductController@index')->name('admin.products');
    Route::get('admin/products', 'Admin\ProductController@indexJson')->name('admin.products.index');
    Route::get('admin/products/{product}', 'Admin\ProductController@show')->name('admin.product.show');
    Route::get('admin/productJson/{product}', 'Admin\ProductController@showJson')->name('admin.product.show.json');
    Route::delete('admin/product/{id}', 'Admin\ProductController@destroy')->name('admin.product.destroy');
    Route::post('admin/products/{id}', 'Admin\ProductController@update')->name('admin.product.update');  //todo shoud be PUT
    Route::put('admin/product/{id}/{value}', 'Admin\ProductController@changeStatus')->name('admin.product.change.status');
    Route::post('admin/product', 'Admin\ProductController@store')->name('admin.product.store');
});
