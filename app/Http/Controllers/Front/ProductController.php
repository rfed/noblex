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

    	$category = Category::where('url', $category)->first();
    	$product = Product::with(['productsMedia', 'sectionproducts', 'features', 'relatedproducts'])->where('sku', $product)->first();

        $relatedproducts = [];

        foreach($product->relatedproducts as $relatedproduct)
        {
            $relatedproducts = ProductMedia::with('product')
                                            ->where('type', 'image_thumb')
                                            ->where('product_id', $relatedproduct->id)->get();
        }

    	$breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
    	$breadcrumbs[] = ['caption' => $category->name];

    	return view('front.pages.productos', compact("breadcrumbs", "product", "relatedproducts", "page_id"));
    }
}
