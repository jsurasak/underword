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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/','DashboardController@index');
    Route::post('/chart_month', 'DashboardController@month');
    Route::post('/chart_years', 'DashboardController@years');


    Route::get('/banner','BannerController@index');
    Route::post('/banner', 'BannerController@save');


    Route::get('/new','NewController@index');
    Route::get('/new/create', 'NewController@create');
    Route::get('/new/{id}/edit', 'NewController@edit');
    Route::get('/new/{id}/delete', 'NewController@del');
    Route::post('/new/add', 'NewController@add');
    Route::post('/new/save', 'NewController@save');
    Route::post('/new_datatable', 'NewController@datatable');

    Route::get('/catalogs', 'CatalogsController@index');
    Route::get('/catalogs/create', 'CatalogsController@create');
    Route::get('/catalogs/{id}/edit', 'CatalogsController@edit');
    Route::get('/catalogs/{id}/delete', 'CatalogsController@del');
    Route::post('/catalogs/add', 'CatalogsController@add');
    Route::post('/catalogs/save', 'CatalogsController@save');
    Route::post('/catalogs_datatable', 'CatalogsController@datatable');


    Route::get('/product', 'ProductsController@index');
    Route::get('/product/create', 'ProductsController@create');
    Route::get('/product/{id}/edit', 'ProductsController@edit');
    Route::get('/product/{id}/delete', 'ProductsController@del');
    Route::get('/product/{id}/status/{status}', 'ProductsController@statsu');
    Route::post('/product/add', 'ProductsController@add');
    Route::post('/product/save', 'ProductsController@save');
    Route::post('/product_datatable', 'ProductsController@datatable');


    Route::get('/order','OrderController@index');
    Route::post('/order/ems', 'OrderController@ems');
    Route::post('/oreder/detail','OrderController@detail');
    Route::post('/order_datatable', 'OrderController@datatable');
    

    
    
    Route::get('/admin', 'AdminController@index');
    Route::post('/admin_datatable', 'AdminController@datatable');
    Route::get('/admin/new', 'AdminController@create');
    Route::post('/admin/add', 'AdminController@add');
    Route::get('/admin/{id}/edit', 'AdminController@edit');
    Route::post('/admin/save', 'AdminController@save');
    Route::get('/admin/{id}/password', 'AdminController@password');
    Route::post('/admin/changepassword', 'AdminController@savepassword');
    Route::get('/admin/{id}/delete', 'AdminController@delete');


});

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
