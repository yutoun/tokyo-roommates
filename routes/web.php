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

Route::get('/', function () {
    return redirect('/shops');
});
Route::get('/shops','ShopController@index')->name('shop.list');
Route::get('/shop/new','ShopController@create')->name('shop.new');
Route::match(['get', 'post'], '/post','PostsController@add')->name('post.add');
Route::match(['get', 'post'], '/post/create','PostsController@create')->name('post.new');
Route::get('/shop/edit/{id}','ShopController@edit')->name('shop.edit');
Route::post('/shop/update/{id}','ShopController@update')->name('shop.update');
Route::post('/shop','ShopController@store')->name('shop.store');
Route::post('/shop/upload','ShopController@upload')->name('shop.upload');

Route::get('/shop/{id}','ShopController@show')->name('shop.detail');
// この{id}がshowメソッドの引数になる。そしてこの{{id}}はindexで送られてくる。id空かstringだとエラーになるからあとでルーティングしないといけなかった
Route::delete('/shop/{id}','ShopController@destroy')->name('shop.destroy');//なんでdelete/{id}じゃない？

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
