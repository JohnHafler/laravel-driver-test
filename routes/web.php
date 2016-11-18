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

Route::match(['get', 'post'], 'register', 'RestApi\RestApi@registration');

Route::match(['get', 'post'], 'login', 'RestApi\RestApi@auth');

Route::match(['post'], 'logout', 'RestApi\RestApi@logout');

Route::match(['get', 'post'], 'add-order', 'RestApi\RestApi@addOrder');

Route::match(['get'], 'list-order', 'RestApi\RestApi@listOrder');

Route::match(['get'], 'get-map-info', 'RestApi\RestApi@getMapInfo');

//Auth::routes();

Route::get('/home', 'HomeController@index');
