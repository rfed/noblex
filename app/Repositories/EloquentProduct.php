<?php

namespace Noblex\Repositories;

use Noblex\Product;

class EloquentProduct
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
		if($request->input('featured') == 'on')
            $request['featured'] = 1;

        if($request->input('active') == 'on')
            $request['active'] = 1;

        $product = Product::create($request->all())->id;

       	return $product;
	}
}