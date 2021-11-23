<?php

namespace Noblex\Repositories;

use Illuminate\Support\Facades\Storage;
use Noblex\ProductMedia;

class EloquentProductMedia
{
	public function store($product)
	{
		if(request()->ajax())
        {

            
            $productMedia = new ProductMedia;
            $productMedia->product_id = $product;

            if(!empty(request()->file('image_featured'))) {
                $filename = request()->file('image_featured')->getClientOriginalName();
                $file = request()->file('image_featured')->storeAs('productos', $filename, 'public');

                $productMedia->type = 'image_featured';
                $productMedia->source = $file;
            }

            if(!empty(request()->file('image_featured_background'))) {
                $filename = request()->file('image_featured_background')->getClientOriginalName();
                $file = request()->file('image_featured_background')->storeAs('productos', $filename, 'public');

                $productMedia->type = 'image_featured_background';
                $productMedia->source = $file;
            }

            if(!empty(request()->file('image_thumb'))) {
                $file = request()->file('image_thumb')->store('productos', 'public');

                $productMedia->type = 'image_thumb';
                $productMedia->source = $file;
            }



            if(!empty(request()->file('image'))) {
                $file = request()->file('image')->store('productos', 'public');
                $productMedia->type = 'image';
                $productMedia->source = $file;

            }

            $productMedia->position = 1;
            $productMedia->save();
            return $productMedia;
        }
    }

    public function destroyImage($request)
    {
        $producto = ProductMedia::where('product_id', $request->product_id)->where('source', $request->image)->first();
        $producto->delete();

        Storage::disk('public')->delete($request->image);

        return response()->json(['delete' => true]);
    }
    
    public function destroy($id){
        return $media->delete() ? 'OK' : '';
    }
}