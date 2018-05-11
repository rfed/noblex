<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Http\Request;
use Noblex\Category;
use Noblex\Http\Controllers\Controller;
use Noblex\Http\Controllers\Front\FrontController;
use Noblex\Product;

class BusquedaController extends FrontController
{
	public function __construct()
	{
		parent::__construct();
	}

    public function store(Request $request)
    {
        $page_id = 'resultados';
        $breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
        $breadcrumbs[] = ['caption' => 'Resultados de búsqueda', 'link' => ''];

        $productos = Product::with(['category:id,url', 'thumb:product_id,source'])
        					->where('name', 'LIKE', '%'.$request->buscar.'%')
        					->get();

        if($productos->isEmpty())
        {
        	$page_id = 'sin_resultados';
        	$randomCategories = Category::where('root_id', '!=', 0)
                                            ->inRandomOrder()
                                            ->limit(3)
                                            ->get();

        	return view('front.pages.sin_resultados', compact("page_id", "breadcrumbs" ,"randomCategories" ,"request"));
        }

        return view('front.pages.busqueda', compact("page_id", "breadcrumbs", "productos", "request"));
    }
}
