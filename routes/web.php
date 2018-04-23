<?php

/*DB::listen(function($query)
{
	echo "<pre>{{$query->sql}}</pre>";  // Para ver las consultas sql que se estan generando.
});*/


Route::group([
	'prefix'	=> 'panel'
], function() {

	// Authentication Routes...
	Route::get('/', 'Admin\Auth\LoginController@showLoginForm')->name('login');
	Route::post('/', 'Admin\Auth\LoginController@login');
	Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

	/*// Registration Routes...  (Lo tengo que usar mas adelante.)
	Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'Auth\RegisterController@register');*/


	// Password Reset Routes...
	Route::get('password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('password/reset', 'Admin\Auth\ResetPasswordController@reset');

	Route::get('home', 'Admin\HomeController@index')->name('admin.home');


	// Categorias
	Route::resource('categorias', 'Admin\CategoryController', [
		'names' => 'admin.categorias'
	]);


	// Productos
	Route::resource('productos', 'Admin\ProductController', [
		'names' => 'admin.productos'
	]);


	// Productos Media
	Route::group([
		'prefix' => 'productos'
	], function() { 

		Route::get('{product}/files/create', 'Admin\ProductMediaController@create')->name('admin.productos.files.create');
		Route::post('{product}/files', 'Admin\ProductMediaController@store')->name('admin.productos.files.store');

	});

	// Productos modulo seccion
	Route::group([
		'prefix' => 'productos'
	], function() { 

		Route::get('{product}/section/create', 'Admin\ProductSectionController@create')->name('admin.productos.section.create');
		Route::post('{product}/section', 'Admin\ProductSectionController@store')->name('admin.productos.section.store');

	});

	// Widgets
	Route::delete('widgets/media/{id}', 'Admin\WidgetController@deleteMedia')->name('admin.widgets.media.delete');
	
	Route::post('widgets/media', 'Admin\WidgetController@upload')->name('admin.widgets.media.store');

	Route::post('widgets/orden', 'Admin\WidgetController@ordenar')->name('admin.widgets.media.orden');
	
	Route::resource('widgets', 'Admin\WidgetController', [
		'names' => 'admin.widgets'
	]);


});

Route::get('/', 'Front\HomeController@index')->name('home');

Route::get('/productos', 'Front\ProductController@index')->name('productos');