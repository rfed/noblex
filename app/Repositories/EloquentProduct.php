<?php

namespace Noblex\Repositories;

use Noblex\Product;
use Noblex\Repositories\Interfaces\ProductInterface;

class EloquentProduct implements ProductInterface
{
	public function getAll()
	{
		return Product::with('category:id,name')->get();
	}

	public function getAllDistinctId($id)
	{
		return Product::where('id', '!=', $id)->get();
	}

	public function store($request)
	{
		$data = $request->validated();

		if($request->input('featured') == 'on')
            $data['featured'] = 1;

        if($request->input('active') == 'on')
            $data['active'] = 1;

        if($request->input('subcategory_id'))
        	$data['category_id'] = $request->subcategory_id;

        $product = Product::create($data);

        if($request->input('feature_product_id'))
        {
            $product->features()->attach($request->feature_product_id);
        }

        if($request->input('product_relationship_id'))
        {
        	$product->relatedproducts()->attach($request->product_relationship_id);
        }
     
       	return $product->id;
	}
}