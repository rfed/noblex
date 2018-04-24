<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Http\Request;
use Noblex\Category;
use Noblex\Http\Controllers\Front\FrontController;
use Noblex\Product;

class ProductController extends FrontController
{
	public function __construct()
    {
        parent::__construct();
    }
    
    public function index($category, $subcategory, $product)
    {
    	$category = Category::where('url', $category)->first();
    	$product = Product::with(['productsMedia', 'sectionproducts'])->get();

    	$breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
    	$breadcrumbs[] = ['caption' => $category->name];

    	dd($product);

    	return view('front.pages.productos', compact("breadcrumbs", "product"));
    }
}
