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
Route::get('/admin/login','Admin\LoginController@getLogin')->name('admin.get.login');
Route::post('/admin/login','Admin\LoginController@postLogin')->name('admin.post.login');

// Route admin
Route::group(['middleware' => 'admin','prefix' => 'admin'],function(){
	Route::get('/','Admin\AdminController@index')->name('admin.get.index');
	Route::get('logout','Admin\AdminController@logout')->name('admin.get.logout');
	Route::resource('profile','Admin\ProfileController',['as'=>'admin']);
	Route::resource('company','Admin\CompanyController',['as' => 'admin']);

	//new
	Route::get('new/search','Admin\NewsController@search')->name('admin.new.search');
	Route::resource('new','Admin\NewsController',['as' => 'admin']);
	
	//product
	
	Route::get('product/search','Admin\ProductsController@search')->name('admin.product.search');
	Route::resource('product','Admin\ProductsController',['as' => 'admin']);

	//order
	Route::get('order/received','Admin\OrderController@received')->name('admin.order.received');
	Route::resource('order','Admin\OrderController',['as' => 'admin']);

	//customer
	Route::get('customer/search','Admin\CustomerController@search')->name('admin.customer.search');
	Route::resource('customer','Admin\CustomerController',['as' => 'admin']);

	
});

//Route customer

Route::group([],function(){
	Route::get('/login','Customer\UserController@getLogin')->name('customer.get.login');
	Route::post('/login','Customer\UserController@postLogin')->name('customer.post.login');
	Route::get('/register','Customer\UserController@getRegister')->name('customer.get.register');
	Route::post('/register','Customer\UserController@postRegister')->name('customer.post.register');

	Route::get('/','Customer\HomeController@index')->name('customer.index');
	Route::get('/{category}','Customer\HomeController@get_category')->name('customer.category');
	Route::get('/product/{id}','Customer\HomeController@get_product')->name('customer.product');
	Route::get('/404','Customer\Customer\HomeController@error')->name('404');
	// User sau khi đăng nhập
	Route::group(['middeware' => 'customer','prefix' => 'customer'],function(){
		// Route::get('/','Customer\UserController@index')->name('customer.profile');
		Route::get('/logout','Customer\UserController@logout')->name('customer.logout');
		Route::get('/cart','Customer\CartController@index')->name('customer.cart');
		Route::get('/add-cart/{id}','Customer\CartController@getAddtoCart')->name('customer.cart.add');
		Route::get('/delete-cart/{id}','Customer\CartController@deleteCart')->name('customer.cart.delete');
		Route::get('/delete-all-cart','Customer\CartController@deleteallCart')->name('customer.cart.deleteall');
		Route::get('/order','Customer\OrderCustomerController@orderCart_get')->name('customer.get.order');
		Route::post('/order','Customer\OrderCustomerController@orderCart')->name('customer.post.order');
		Route::post('/orderproduct','Customer\OrderCustomerController@orderProduct')->name('customer.product.order');

		Route::resource('profile','Customer\CustomerProfileController',['as' => 'customer']);
	});

	//lỗi 404
	
});