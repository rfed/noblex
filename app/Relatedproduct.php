<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Product;

class Relatedproduct extends Model
{
	public function products()
	{
		return $this->belongsToMany(Product::class, 'relatedproducts', 'product_relationship_id', 'product_id')->withTimestamps();
	}
}
