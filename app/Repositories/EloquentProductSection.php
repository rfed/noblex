<?php

namespace Noblex\Repositories;

use Noblex\ProductSection;
use Noblex\Repositories\EloquentProductSection;

class EloquentProductSection
{
	public function store($product, $request)
	{
    	$productSection = new ProductSection;
    	$productSection->product_id = $product;

    	$productSection->title = $request->title;
        $productSection->subtitle = $request->subtitle;
        $productSection->description = $request->description;
        $productSection->alignment = $request->alignment;

    	if(!empty(request()->file('image'))) {
            $file = request()->file('image')->store('sectionproducts', 'public');

            $productSection->source = $file;
        }

    	$productSection->save();

	}

}