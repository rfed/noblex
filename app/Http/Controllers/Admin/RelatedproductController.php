<?php

namespace Noblex\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Noblex\Http\Controllers\Controller;
use Noblex\Relatedproduct;
use Noblex\Repositories\EloquentRelatedProduct;

class RelatedproductController extends Controller
{
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(EloquentRelatedProduct $relatedProduct, Request $request)
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
