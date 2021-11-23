<?php

namespace Noblex\Http\Controllers\Front;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Front\FrontController;
use Noblex\Repositories\EloquentProduct;

class DescargasController extends FrontController
{
    public function index(EloquentProduct $product)
    {
        $productos = $product->getAllWithManualAndActive();
        $page_id = 'descargas';
        $breadcrumbs[] = ['caption' => 'Home', 'link' => ''];
    	$breadcrumbs[] = ['caption' => 'Centro de descargas', 'link' => ''];

        return view('front.pages.descargas', compact("productos", "page_id", "breadcrumbs"));
    }
}
