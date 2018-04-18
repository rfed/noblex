<?php

namespace Noblex\Repositories;

use Illuminate\Support\Facades\Cache;
use Noblex\Repositories\EloquentProduct;
use Noblex\Repositories\Interfaces\ProductInterface;

class CacheProduct implements ProductInterface
{
	private $product;

	public function __construct(EloquentProduct $product)
	{
		$this->product = $product;
	}


	public function getAll()
	{
		return Cache::tags('productos')->rememberForever('productos.index', function() {
			return $this->product->getAll();
		});
	}

	public function getAllById($id)
	{
		return Cache::tags('relatedProducts')->rememberForever('relatedProducts.{id}.index', function() use($id) {
			return $this->product->getAllById($id);
		});
	}

	public function store($request) 
	{
		$product = $this->product->store($request);

		Cache::tags('productos')->flush();

		return $product;
	}
}