<?php

namespace Noblex\Repositories;

use Illuminate\Support\Facades\Storage;

class EloquentProductMedia
{
	public function store($request)
	{
		if($request->ajax())
        {
            $productMedia = new ProductMedia;
            $productMedia->product_id = $request->product_id;

            if(!empty($request->file('image'))) {
                $file = $request->file('image')->store('productos', 'public');

                $productMedia->source = $file;
            }

            if(!empty($request->file('featured_image'))) {
                $file = $request->file('featured_image')->store('productos', 'public');

                $productMedia->type = 'featured';
                $productMedia->source = $file;
            }

            if(!empty($request->file('document'))) {
                $file = $request->file('document')->store('productos', 'public');

                $productMedia->type = 'document';
                $productMedia->source = $file;
            }

            $productMedia->position = 1;
            $productMedia->save();
        }

        $producto_id = $request->product_id;

        return $producto_id;
	}
}