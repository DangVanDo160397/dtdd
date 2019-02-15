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


	
//Route customer

Route::group([],function(){
	Route::get('/login','UserController@getLogin')->name('customer.get.login');
	Route::post('/login','UserController@postLogin')->name('customer.post.login');

	Route::get('/','HomeController@index')->name('customer.index');
	Route::get('/{category}','HomeController@get_category')->name('customer.category');
	Route::get('/product/{id}','HomeController@get_product')->name('customer.product');
	// User sau khi đăng nhập
	Route::group(['middeware' => 'customer','prefix' => 'customer'],function(){
		Route::get('/logout','UserController@logout')->name('customer.logout');
		Route::post('/information','UserController@information')->name('customer.information');
		Route::get('/cart','CartController@index')->name('customer.cart');
		Route::get('/add-cart/{id}','CartController@getAddtoCart')->name('customer.cart.add');
		Route::get('/delete-cart/{id}','CartController@deleteCart')->name('customer.cart.delete');
		Route::post('/order','OrderCustomerController@orderCart')->name('customer.order');
	});
});




// Xác thực admin
Route::get('/admin/login','AdminController@getLogin')->name('admin.get.login');
Route::post('/admin/login','AdminController@postLogin')->name('admin.post.login');

// Route admin
Route::group(['middleware' => 'admin','prefix' => 'admin'],function(){
	Route::get('/index','AdminController@index')->name('admin.get.index');
	Route::get('logout','AdminController@logout')->name('admin.get.logout');
	Route::resource('profile','ProfileController',['as'=>'admin']);
	Route::resource('company','CompanyController',['as' => 'admin']);

	//new
	Route::get('new/search','NewsController@search')->name('admin.new.search');
	Route::resource('new','NewsController',['as' => 'admin']);
	
	//product
	
	Route::get('product/search','ProductsController@search')->name('admin.product.search');
	Route::resource('product','ProductsController',['as' => 'admin']);

	//order
	Route::get('order/received','OrderController@received')->name('admin.order.received');
	Route::resource('order','OrderController',['as' => 'admin']);

	//customer
	Route::get('customer/search','CustomerController@search')->name('admin.customer.search');
	Route::resource('customer','CustomerController',['as' => 'admin']);
});