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

/*
|--------------------------------------------------------------------------
| Frontend site
|--------------------------------------------------------------------------
*/
Route::get('/','HomeController@index');
/*
|--------------------------------------------------------------------------
| Backend site
|--------------------------------------------------------------------------
*/
Route::Resource('categoria','CategoriaController');
Route::Resource('producto','ProductoController');
Route::Resource('usuario','UserController');
Route::Resource('industria','ManufactureController');
Auth::routes();
Route::get('/login','AdminController@login');
Route::get('/registro','AdminController@register');
Route::get('/admin','AdminController@dashboard');
Route::get('/unactive_product/{product_id}','ProductoController@unactive_product');
Route::get('/active_product/{product_id}','ProductoController@active_product');
Route::get('/unactive_category/{category_id}','CategoriaController@unactive_category');
Route::get('/active_category/{category_id}','CategoriaController@active_category');
Route::get('/unactive_manufacture/{manufacture_id}','ManufactureController@unactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}','ManufactureController@active_manufacture');
