<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Http\Controllers\Front\FrontController;
use Noblex\Category;

class CategoryController extends FrontController
{
	public function __construct()
    {
        parent::__construct();
    }
    
    public function index($slug)
    {
    	$category = Category::where('url', $slug)->first();
    	$page_id = 'categoria';

    	$breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
    	$breadcrumbs[] = ['caption' => $category->name, 'link' => $category->url];

    	return view('front.pages.categoria', compact('category', 'page_id', 'breadcrumbs'));
    }

    public function subcategory($slug1, $slug2)
    {
    	$parentCategory = Category::where('url', $slug1)->first();
    	$category = Category::where('url', $slug2)->first();
    	
    	$page_id = 'categoria';

    	$breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
    	$breadcrumbs[] = ['caption' => $parentCategory->name, 'link' => $parentCategory->url];
    	$breadcrumbs[] = ['caption' => $category->name, 'link' => $category->url];

    	return view('front.pages.categoria_individual', compact('category', 'parentCategory', 'page_id', 'breadcrumbs'));
    }}
