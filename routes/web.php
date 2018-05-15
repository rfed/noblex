<?php

/*DB::listen(function($query)
{
	echo "<pre>{{$query->sql}}</pre>";  // Para ver las consultas sql que se estan generando.
});*/


Route::group([
	'prefix'	=> 'panel'
], function() {

	// Authentication Routes...
	Route::get('/', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('/', 'Admin\Auth\LoginController@login');
	Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

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


	// Usuarios
	Route::resource('users', 'Admin\UserController', [
		'names' 	=> 'admin.users',
		'except'	=> 'show'
	]);

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

		Route::post('atributos', 'Admin\ProductController@atributos')->name('admin.productos.atributos');

		Route::post('atributos/delete', 'Admin\ProductController@deleteAtributo')->name('admin.productos.atributos.delete');

		Route::post('atributos/add', 'Admin\ProductController@addAtributos')->name('admin.productos.atributos.agregar');

		Route::get('{product}/files/create', 'Admin\ProductMediaController@create')->name('admin.productos.files.create');
		
		Route::post('{product}/files', 'Admin\ProductMediaController@store')->name('admin.productos.files.store');
		
		Route::post('{product}/files/ordenar', 'Admin\ProductMediaController@ordenar')->name('admin.productos.section.ordenar');

		Route::delete('{product}/files/{id}', 'Admin\ProductMediaController@destroy')->name('admin.productos.files.destroy');

	});

	// Productos modulo seccion
	Route::group([
		'prefix' => 'productos'
	], function() { 

		Route::post('{product}/section', 'Admin\ProductSectionController@store')->name('admin.productos.section.store');
		

		Route::delete('{product}/section/{id}', 'Admin\ProductSectionController@destroy')->name('admin.productos.section.destroy');
		

		Route::post('{product}/sectionUpload', 'Admin\ProductSectionController@upload')->name('admin.productos.section.upload');

		Route::post('{product}/deleteProductSectionImage', 'Admin\ProductSectionController@destroyImage')->name('admin.productos.section.destroyImage');
		
	});

	// Widgets
	Route::delete('widgets/media/{id}', 'Admin\WidgetController@deleteMedia')->name('admin.widgets.media.delete');

	Route::post('widgets/media', 'Admin\WidgetController@createMedia')->name('admin.widgets.media.store');

	Route::resource('widgets', 'Admin\WidgetController', [
		'names' => 'admin.widgets'
	]);

	Route::post('widgets/orden', 'Admin\WidgetController@ordenar')->name('admin.widgets.media.orden');

	Route::resource('slider', 'Admin\SliderController', [
		'names' => 'admin.slider'
	]);	

	Route::get('newsletter', 'NewsletterController@index')->name('admin.newsletter.index');

	// Novedades
	Route::resource('stories', 'Admin\StoryController', [
		'names' 	=> 'admin.stories',
		'except'	=> 'show'
	]);

	// Categorias de novedades
	Route::resource('themes', 'Admin\ThemeController', [
		'names' 	=> 'admin.themes',
		'except'	=> 'show'
	]);

	// Tags
	Route::resource('tags', 'Admin\TagController', [
		'names' 	=> 'admin.tags',
		'except'	=> 'show'
	]);

	// Paginas
	Route::resource('pages', 'Admin\PageController', [
		'names' 	=> 'admin.pages',
		'except'	=> 'show'
	]);	
	Route::post('pages/upload', 'Admin\PageController@upload');

});


/********** FRONTEND **********/

Route::get('/', 'Front\HomeController@index')->name('home');

Route::get('/{subcategory}/{product}', 'Front\ProductController@index')->name('productos');
//Route::get('/{slug}', 'Front\CategoryController@index')->where('slug', '^(?!panel$).*$')->name('categoria');


Route::post('/newsletter', 'NewsletterController@store')->name('newsletter.store');


/*Route::get('/{category}/{subcategory?}/{product}', 'Front\ProductController@index')->name('productos');
Route::get('/{slug}', 'Front\CategoryController@index')->where('slug', '^(?!login|register|contacto|descargas$).*$')->name('categoria');*/


// Authentication Routes...
Route::get('/login', 'Front\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Front\Auth\LoginController@login');
Route::post('logout', 'Front\Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Front\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Front\Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Front\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Front\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Front\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Front\Auth\ResetPasswordController@reset');

// Perfil
Route::get('/perfil', 'Front\PerfilController@edit')->name('perfil.edit');
Route::put('/perfil', 'Front\PerfilController@update')->name('perfil.update');


// Contacto
Route::get('/contacto', 'Front\ContactoController@index')->name('contacto');
Route::post('/contacto', 'Front\ContactoController@store')->name('contacto.store');

// Descargas
Route::get('/descargas', 'Front\DescargasController@index')->name('descargas.index');

//Comparador
Route::post('/comparador/handle', 'Front\ComparadorController@handle');
Route::get('/comparador', 'Front\ComparadorController@index');

Route::get('/{slug}', 'Front\CategoryController@index')->where('slug', '^(?!login|register|contacto$).*$')->name('categoria');
