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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin', function () {
        return view('admin/index');
    });

    Route::get('admin/products', 'Admin\ProductController@index')->name('admin.products.index');
    Route::delete('admin/product/{id}', 'Admin\ProductController@destroy')->name('admin.product.destroy');
    Route::put('admin/product/{id}/{value}', 'Admin\ProductController@changeStatus')->name('admin.product.change.status');
});
