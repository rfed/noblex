<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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

    public function index(Request $request)
    {    	
        $page_id = 'resultados';
        $breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
        $breadcrumbs[] = ['caption' => 'Resultados de búsqueda', 'link' => ''];

        $productos = Product::with(['category:id,url', 'thumb:product_id,source'])
        					->where('name', 'LIKE', '%'.$request->buscar.'%')
        					->paginate(8);

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

    public function autocomplete(Request $request)
    {
        $data = Product::with('category:id,url')->where("name", "LIKE", "%".$request->data."%")->get();

        $results = [];
        foreach ($data as $dato)
        {
            $results[] = [
                'id'    => $dato->id, 
                'name'  => $dato->name,
                'url'   => '/'.$dato->category->url.'/'.$dato->sku
            ];
        }

        return response()->json($results);
    }
}
