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


Route::get('/ticketing',function(){

    return view('backend.ticketing.created');

});


Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
