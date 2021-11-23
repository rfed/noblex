<?php

// Admin
Breadcrumbs::register('home', function($breadcrumbs){
	$breadcrumbs->push('Home', route('admin.home'));
});

// Categories
Breadcrumbs::register('categorias', function($breadcrumbs, $parentCategory){
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Categorías', url('panel/categorias'));
	if ($parentCategory) {
		$breadcrumbs->push($parentCategory->name, url('panel/categorias'));
	}
});

Breadcrumbs::register('categorias.edit', function($breadcrumbs, $parentCategory, $category){
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Categorías', url('panel/categorias'));
	if ($parentCategory && $parentCategory->id > 1) {
		$breadcrumbs->push($parentCategory->name, url('panel/categorias/?root_id='.$parentCategory->id));
	}
	if ($category) {
		$breadcrumbs->push($category->name, url('panel/categorias'));
	}
	else {
		$breadcrumbs->push('Crear', url('panel/categorias'));	
	}
});
