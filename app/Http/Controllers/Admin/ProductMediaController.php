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


    public function destroy($prod, $id)
    {
        if(request()->ajax())
        {
            
            //$img = Storage::url($request->file('image'));
            $media = ProductMedia::destroy($id);
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
