<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Noblex\Http\Controllers\Controller;
use Noblex\Repositories\EloquentProduct;
use Noblex\Repositories\EloquentProductSection;

class ProductSectionController extends Controller
{
    var $section;

    public function __construct(EloquentProductSection $productsection)
    {
        $this->middleware('auth');
        $this->section = $productsection;
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


    public function store($product, Request $request)
    {
        
        return $this->section->store($product, $request);
    }

    public function upload(Request $request, $product)
    {
        return $this->section->upload($product, $request);
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


    public function destroy($producto, $id)
    {
        return $this->section->destroy($id);
    }

    public function ordenar(Request $request, $product)
    {
        return $this->section->ordenar($request);
    }
}
