<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Http\Controllers\Front\FrontController;
use Noblex\Category;
use Noblex\Product;
use Noblex\Page;

class CategoryController extends FrontController
{
	public function __construct()
    {
        parent::__construct();
    }
    
    public function index($slug)
    {
        $category = Category::where('url', $slug)->first();

        if ($category) {
            if ($category->root_id == 1 && count($category->childs)>0) {
                return $this->category($category);
            }
            else {
                return $this->subcategory($category);
            }
        }
        else {
            //Verify if slug matches a page
            $page = Page::where('url', $slug)->where('visible', 1)->first();
            if ($page) {
                $breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
                $breadcrumbs[] = ['caption' => $page->title, 'link' => ''];

                $page_id = $page->template->reference;
                return view('front.pages.template', compact('page', 'page_id', 'breadcrumbs'));
            }
            else {
                $randomCategories = Category::where('root_id', 1)
                                            ->inRandomOrder()
                                            ->limit(3)
                                            ->get();

                //404
                $data = ['randomCategories' => $randomCategories];
                return response()->view('errors.404', $data, 404);

            }
        }
    }

    private function category($category) {
        $page_id = 'categoria';

        $breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
        $breadcrumbs[] = ['caption' => $category->name, 'link' => $category->url];

        return view('front.pages.categoria', compact('category', 'page_id', 'breadcrumbs')); 
    }

    private function subcategory($category) {
        $page_id = 'categoria';

        $parentCategory = $category->parent;

        $breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
        if ($category->root_id != 1) {
            $breadcrumbs[] = ['caption' => $parentCategory->name, 'link' => $parentCategory->url];
        }
        $breadcrumbs[] = ['caption' => $category->name, 'link' => $category->url];

        $products = Product::where('category_id', $category->id)->where('active', 1)->paginate(12);

        return view('front.pages.categoria_individual', compact('category', 'parentCategory', 'page_id', 'breadcrumbs', 'products'));
    }

}
