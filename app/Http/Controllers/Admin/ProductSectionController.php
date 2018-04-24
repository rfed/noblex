<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Noblex\Http\Controllers\Controller;
use Noblex\Repositories\EloquentProduct;
use Noblex\Repositories\EloquentProductSection;

class ProductSectionController extends Controller
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
            return view('admin.pages.sectionproducts.create', compact("product"));

        return redirect()->route('admin.productos.index');
    }


    public function store($product, Request $request, EloquentProductSection $productsection)
    {
        $productsection->store($product, $request);

        return redirect()->route('admin.productos.index')->with('success', 'Producto agregado correctamente');
    }

    public function upload($product, Request $request, EloquentProductSection $productsection)
    {
        return $productsection->upload($product, $request);
    }

    public function destroyImage($product, Request $request)
    {
        Storage::disk('public')->delete($request->image);  
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
