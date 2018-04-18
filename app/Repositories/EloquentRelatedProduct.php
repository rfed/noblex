<?php

namespace Noblex\Repositories;

use Noblex\Relatedproduct;

class EloquentRelatedProduct
{
	public function store($request)
	{
		foreach($request->product_relationship_id as $product_relationship) 
        {
            $relatedproducts = new Relatedproduct;

            $relatedproducts->product_id = $request->product_id;
            $relatedproducts->product_relationship_id = $product_relationship;
            $relatedproducts->save();
        }
	}
}