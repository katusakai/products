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
    Route::get('/admin', 'Admin\ProductController@home')->name('admin.products');
    Route::get('admin/products', 'Admin\ProductController@index')->name('admin.products.index');
    Route::delete('admin/product/{id}', 'Admin\ProductController@destroy')->name('admin.product.destroy');
    Route::put('admin/product/{id}/{value}', 'Admin\ProductController@changeStatus')->name('admin.product.change.status');
    Route::post('admin/product', 'Admin\ProductController@store')->name('admin.product.store');
});
