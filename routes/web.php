<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login', 'LoginController@LoginGet')->name('login.get');
Route::post('/login', 'LoginController@LoginPost');

Route::group(['prefix' => 'admin'], function () {
    Route::get('', 'AdminController@index')->name('admin.index');
    Route::group(['prefix' => 'sản-phẩm', 'namespace'=>'Product'], function () {
        Route::get('', 'ProductController@index')->name('product.index');
        Route::get('Thêm-mới-sản-phẩm.html', 'ProductController@create')->name('product.create');
        Route::get('Chỉnh-sửa-chi-tiết-sản-phẩm.html', 'ProductController@edit')->name('product.edit');
        Route::get('Xóa-sản-phẩm', 'ProductController@delete')->name('product.delete');
    });
});