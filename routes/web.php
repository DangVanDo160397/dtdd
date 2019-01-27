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
// Xác thực admin
Route::get('/login','AdminController@getLogin')->name('admin.get.login');

Route::post('/login','AdminController@postLogin')->name('admin.post.login');
Route::group(['middleware' => 'admin','prefix' => 'admin'],function(){
	Route::get('/','AdminController@index')->name('admin.get.index');
	Route::get('/profile','AdminController@profile')->name('admin.get.profile');
	Route::get('logout','AdminController@logout')->name('admin.get.logout');

	Route::resource('company','CompanyController',['as' => 'admin']);
	Route::resource('new','NewsController',['as' => 'admin']);
});