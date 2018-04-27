<?php

namespace Noblex\Repositories;

use Illuminate\Support\Facades\Storage;
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

        if($request->file('manual'))
        	$data['manual'] = $request->file('manual')->store('productos', 'public');


        $product = Product::create($data);

        if($request->input('feature_product_id'))
        {
            $product->features()->sync($request->feature_product_id);
        }
        else {
        	$product->features()->detach();
        }

        if($request->input('product_relationship_id'))
        {
        	$product->relatedproducts()->sync($request->product_relationship_id);
        }
        else {
        	$product->relatedproducts()->detach();
        }
     
       	return $product->id;
	}

	public function update($request, $id)
	{		
		$data = $request->validate($request->rules());
		$product = Product::findOrFail($id);

		$data['featured'] = $request->input('featured') == 'on' ? 1 :0;
		$data['active'] = $request->input('active') == 'on' ? 1 :0;
		$data['category_id'] = $request->input('subcategory_id') ? $request->subcategory_id : $request->input('category_id');
		$data['tag'] = $request->input('tag') ?  $request->input('tag') : '';

		if($request->file('manual')) {
			Storage::disk('public')->delete($product->manual);
        	$data['manual'] = $request->file('manual')->store('productos', 'public');
		}

        $product->update($data);

        if($request->input('feature_product_id'))
        {
            $product->features()->sync($request->feature_product_id);
        }
        else {
        	$product->features()->detach();
        }

        if($request->input('product_relationship_id'))
        {
        	$product->relatedproducts()->sync($request->product_relationship_id);
        }
        else {
        	$product->relatedproducts()->detach();
        }
     
       	return $product->id;
	}

	public function destroy($id) 
	{
		$product = Product::findOrFail($id);
        $product->delete();
	}

	public function findById($id) 
	{
        return Product::findOrFail($id);
	}
}