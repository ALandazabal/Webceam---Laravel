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
Route::Resource('metodo-pago','PaymentController');
Auth::routes();
Route::get('/login','AdminController@login');
Route::get('/logout','AdminController@logout');
Route::get('/registro','AdminController@register');
Route::get('/accept','AdminController@dashboard');
Route::get('/admin','AdminController@show_dashboard');
Route::get('/user/{email}','UserController@show_dashboard');
Route::get('/perfil','UserController@perfil');
Route::get('/usuario/{user_id}/editu','UserController@edit_user');
Route::post('/usuario/{user}','UserController@update_user')->name('usuario.update_user');/**/
Route::get('/unactive_product/{product_id}/{user_id}','ProductoController@unactive_product');
Route::get('/active_product/{product_id}/{user_id}','ProductoController@active_product');
Route::get('/producto/create/{user_id}','ProductoController@crear');
Route::get('/producto/{product_id}/editar/{user_id}','ProductoController@editar');
Route::get('/producto/all/{user_id}','ProductoController@all_products');
Route::get('/productos/{user_id}','ProductoController@inicio');
Route::get('/unactive_category/{category_id}','CategoriaController@unactive_category');
Route::get('/active_category/{category_id}','CategoriaController@active_category');
Route::get('/unactive_manufacture/{manufacture_id}','ManufactureController@unactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}','ManufactureController@active_manufacture');
Route::get('/unactive_user/{user_id}','UserController@unactive_user');
Route::get('/active_user/{user_id}','UserController@active_user');
Route::get('/unactive/{user_id}','UserController@unactive');
Route::get('/unactive_payment/{payment_id}','PaymentController@unactive_payment');
Route::get('/active_payment/{payment_id}','PaymentController@active_payment');
Route::get('/become_user_admin/{user_id}','UserController@become_user_admin');