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

            if(!empty(request()->file('image'))) {
                $file = request()->file('image')->store('productos', 'public');

                $productMedia->source = $file;
            }

            if(!empty(request()->file('featured_image'))) {
                $file = request()->file('featured_image')->store('productos', 'public');

                $productMedia->featured = 1;
                $productMedia->source = $file;
            }

            if(!empty(request()->file('document'))) {
                $file = request()->file('document')->store('productos', 'public');

                $productMedia->type = 'document';
                $productMedia->source = $file;
            }

            $productMedia->position = 1;
            $productMedia->save();
        }
	}
}