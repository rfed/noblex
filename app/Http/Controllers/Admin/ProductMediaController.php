<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\ProductMedia;
use Noblex\Repositories\EloquentProduct;
use Noblex\Repositories\EloquentProductMedia;

class ProductMediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(EloquentProduct $product, EloquentProductMedia $productMedia, Request $request)
    {    
        $producto_id = $productMedia->store($request);
        $productos = $product->getAllDistinctId($producto_id);

        return view('admin.pages.productsRelated.create', compact("producto_id", "productos"));
    }


    public function show(ProductMedia $productMedia)
    {
        //
    }


    public function edit(ProductMedia $productMedia)
    {
        //
    }


    public function update(Request $request, ProductMedia $productMedia)
    {
        //
    }


    public function destroy(Request $request, ProductMedia $productMedia)
    {
        if($request->ajax())
        {
            //$contenido = Storage::url($request->file('image'));
            //$request->name = request()->file('image')->store('public');
            return $request;
        }
    }
}
