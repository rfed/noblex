<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Product;

class Category extends Model
{
    protected $fillable = ['name', 'url', 'root_id', 'image' ,'visible'];

	public function setNameAttribute($name)
	{
		$this->attributes['name'] = ucfirst($name);
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
