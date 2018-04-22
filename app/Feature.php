<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Product;

class Feature extends Model
{
	protected $fillable = ['name', 'description'];

	public function products()
	{
		return $this->belongsToMany(Product::class)->withTimestamps();
	}
}
