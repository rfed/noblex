<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Repositories\EloquentProduct;
use Noblex\Repositories\EloquentRelatedProduct;

class RelatedproductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }


    public function create($product, EloquentProduct $Eloquentproduct)
    {
        $productos = $Eloquentproduct->getAllDistinctId($product);

        return view('admin.pages.relatedProducts.create', compact("product", "productos"));
    }


    public function store(Request $request, EloquentRelatedProduct $relatedProduct)
    {
        $relatedProduct->store($request);

        return redirect()->route('admin.productos.index')->with('success', 'Producto agregado correctamente');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
