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
	Route::post('categorias/orden', 'Admin\CategoryController@sort');
	Route::post('categorias/categoriasUpload', 'Admin\CategoryController@upload')->name('admin.categories.upload.store');


	// Marcas
	Route::resource('marcas', 'Admin\BrandController', [
		'names' 	=> 'admin.brands',
		'except'	=> 'show'
	]);

	// Attributes
	Route::resource('attributes', 'Admin\AttributeController', [
		'names' 	=> 'admin.attributes',
		'except'	=> 'show'
	]);


	// Attribute Groups
	Route::resource('groups', 'Admin\GroupController', [
		'names' 	=> 'admin.groups',
		'except'	=> 'show'
	]);

	// Features
	Route::resource('features', 'Admin\FeatureController', [
		'names' 	=> 'admin.features',
		'except'	=> 'show'
	]);

	Route::post('features/featuresUpload', 'Admin\FeatureController@upload')->name('admin.features.upload.store');
	Route::post('features/deleteFeaturesImage', 'Admin\FeatureController@destroyImage')->name('admin.features.upload.delete');


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
		Route::post('{product}/sectionUpload', 'Admin\ProductSectionController@upload')->name('admin.productos.section.upload');
		Route::post('{product}/deleteProductSectionImage', 'Admin\ProductSectionController@destroyImage')->name('admin.productos.section.destroyImage');
		

	});

	Route::resource('widgets', 'Admin\WidgetController', [
		'names' => 'admin.widgets'
	]);

	Route::resource('slider', 'Admin\SliderController', [
		'names' => 'admin.slider'
	]);

	// Widgets
	Route::delete('widgets/media/{id}', 'Admin\WidgetController@deleteMedia')->name('admin.widgets.media.delete');

	Route::post('widgets/media', 'Admin\WidgetController@createMedia')->name('admin.widgets.media.store');

	Route::post('widgets/orden', 'Admin\WidgetController@ordenar')->name('admin.widgets.media.orden');
	
	
	

});

Route::get('/', 'Front\HomeController@index')->name('home');
Route::get('/{slug}', 'Front\CategoryController@index')->name('categoria');
Route::get('/{slug1}/{slug2}', 'Front\CategoryController@subcategory')->name('categoria');

Route::get('/{category}/{subcategory}/{product}', 'Front\ProductController@index')->name('productos');
