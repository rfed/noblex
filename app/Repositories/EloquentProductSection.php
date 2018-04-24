<?php

namespace Noblex\Repositories;

use Noblex\ProductSection;
use Noblex\Repositories\EloquentProductSection;

class EloquentProductSection
{
	public function store($product, $request)
	{
        for($i = 1; $i<=4; $i++)
        {
            if($request->title[$i])
            {
                $productSection = new ProductSection;
                $productSection->product_id = $product;

                $productSection->title = $request->title[$i];
                $productSection->subtitle = $request->subtitle[$i];
                $productSection->description = $request->description[$i];
                $productSection->alignment = $request->alignment[$i];
                $productSection->source = $request->image[$i];
                
                $productSection->save();
            }
        }
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