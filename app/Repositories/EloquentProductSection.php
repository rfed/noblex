<?php

namespace Noblex\Repositories;

use Noblex\ProductSection;
use Noblex\Repositories\EloquentProductSection;

class EloquentProductSection
{
	public function store($product, $request)
	{
        $productSection = ProductSection::where('position', 1)->first();
        if (!$productSection) {
            $productSection = new ProductSection();
        }
        
        $productSection->product_id = $product;
        
        $productSection->title = $request->title;
        $productSection->subtitle = $request->subtitle;
        $productSection->description = $request->description;
        $productSection->alignment = $request->alignment
        $productSection->source = $request->image;
                
        $productSection->save();
	}

    public function upload($product, $request)
    {
        if(!empty($request->file('image1')))
            return $request->file('image1')->store('sectionproducts', 'public');

        if(!empty($request->file('image2')))
            return $request->file('image2')->store('sectionproducts', 'public');

        if(!empty($request->file('image3')))
            return $request->file('image3')->store('sectionproducts', 'public');

        if(!empty($request->file('image4')))
            return $request->file('image4')->store('sectionproducts', 'public');
    }

}