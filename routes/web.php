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
/*Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard','AdminController@dashboard');*/
//Category Related Route
/*Route::get('/add-category','CategoryController@index');
Route::get('/all-category','CategoryController@all_category');
Route::post('/save-category','CategoryController@save_category');
Route::get('/edit-category/{category_id}','CategoryController@edit_category');
Route::post('/update-category/{category_id}','CategoryController@update_category');
Route::get('/delete-category/{category_id}','CategoryController@delete_category');
Route::get('/unactive_category/{category_id}','CategoryController@unactive_category');
Route::get('/active_category/{category_id}','CategoryController@active_category');*/
//Product Related Route
/*Route::get('/add-product','ProductController@index');
Route::get('/all-product','ProductController@all_product');
Route::post('/save-product','ProductController@save_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/unactive_product/{product_id}','ProductController@unactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');*/

/*Route::Resource('/admin','AdminController');*/
Route::Resource('categoria','CategoriaController');
Route::Resource('producto','ProductoController');
Route::Resource('usuario','UserController');
Route::Resource('industria','ManufactureController');
Auth::routes();/**/
Route::get('/login','AdminController@login');
Route::get('/admin','AdminController@dashboard');
Route::get('/unactive_product/{product_id}','ProductoController@unactive_product');
Route::get('/active_product/{product_id}','ProductoController@active_product');
Route::get('/unactive_category/{category_id}','CategoriaController@unactive_category');
Route::get('/active_category/{category_id}','CategoriaController@active_category');
Route::get('/unactive_manufacture/{manufacture_id}','ManufactureController@unactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}','ManufactureController@active_manufacture');
