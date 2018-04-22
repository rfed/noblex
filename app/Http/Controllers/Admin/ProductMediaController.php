<?php

namespace Noblex\Http\Controllers\Admin;

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


    public function create($product, EloquentProduct $productos)
    {
        $productos = $productos->getAll();
        if($productos->pluck('id')->contains($product))
            return view('admin.pages.productsMedia.create', compact("product"));

        return redirect()->route('admin.productos.index');
    }


    public function store($product, EloquentProductMedia $productMedia)
    {    
        $productMedia->store($product);
    
        return redirect()->route('admin.productos.index');
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
