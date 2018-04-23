<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Product;

class Feature extends Model
{
	protected $fillable = ['name', 'description', 'image'];

	public function products()
	{
		return $this->belongsToMany(Product::class)->withTimestamps();
	}
}
