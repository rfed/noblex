<?php

/*DB::listen(function($query)
{
	echo "<pre>{{$query->sql}}</pre>";  // Para ver las consultas sql que se estan generando.
});
*/

// Authentication Routes...
Route::get('/', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
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

Route::resource('categorias', 'Admin\CategoryController', ['names' => 'admin.categorias']);

// Productos
Route::resource('productos', 'Admin\ProductController', ['names' => 'admin.productos']);

// Media
Route::resource('productos/files', 'Admin\ProductMediaController', ['names' => 'admin.productos.files']);



