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


    public function create($product, EloquentProduct $productos)
    {
        $productos = $productos->getAll();
        if($productos->pluck('id')->contains($product))
            return view('admin.pages.productsMedia.create', compact("product"));

        return redirect()->route('admin.productos.index');
    }


    public function store($product, EloquentProductMedia $productMedia)
    {    
        return $productMedia->store($product);
    
        //return redirect()->route('admin.productos.section.create', $product);
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


    public function destroy(Request $request, $prod, $id)
    {
        if(request()->ajax())
        {
            $media = ProductMedia::destroy($id);
            \Storage::disk('public')->delete($request->image);
            //$request->name = request()->file('image')->store('public');
            return $media;
        }
    }

    public function destroyImage(Request $request, EloquentProductMedia $productMedia)
    {
        return $productMedia->destroyImage($request);
    }


    public function ordenar(Request $request){

        if(!empty($request->media)){
            foreach($request->media as $pos => $med){
                
                $media = ProductMedia::findorFail($med['id']);
                $media->position = $pos;
                $media->save();
            }
        }
        
        return [];

    }
}
