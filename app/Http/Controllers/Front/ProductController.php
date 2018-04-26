<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Http\Request;
use Noblex\Category;
use Noblex\Http\Controllers\Front\FrontController;
use Noblex\Product;
use Noblex\ProductMedia;

class ProductController extends FrontController
{
	public function __construct()
    {
        parent::__construct();
    }
    
    public function index($category, $subcategory, $product)
    {
        $page_id = 'producto';

    	$product = Product::with(['productsMedia', 'sectionproducts', 'features', 'relatedproducts'])->where('sku', $product)->first();

        //$category = Category::where('url', $category)->first();        
        $category = Category::where('id', $product->category_id)->first();
        if ($category->root_id > 1) {
            $parentCategory = Category::where('id', $category->root_id)->first();
        }
        else {
            $parentCategory = FALSE;
        }

        if (count($product->relatedproducts)) {
            $relatedproducts = $product->relatedproducts;
            $fixedrelated = TRUE;
        }
        else {
            $relatedproducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
            $fixedrelated = FALSE;
        }

    	$breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
        if ($parentCategory) {
            $breadcrumbs[] = ['caption' => $parentCategory->name, 'link' => $parentCategory->url];
        }
    	$breadcrumbs[] = ['caption' => $category->name];

    	return view('front.pages.productos', compact("breadcrumbs", "product", "relatedproducts", "page_id", "fixedrelated"));
    }
}
