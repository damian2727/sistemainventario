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

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
/*Route::get('/register', 'HomeController@index')->name('register');*/
Route::resource('almacen/category', 'CategoryController');

Route::resource('users', 'UsersController');

Route::resource('providers', 'ProvidersController');

Route::resource('sales/sale', 'SalesController');

Route::resource('articles', 'ArticlesController');

Route::resource('purchases/purchase', 'PurchasesController');