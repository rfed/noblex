<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Product;
use Noblex\InfoInteres;

class Category extends Model
{
    protected $fillable = ['name', 'url', 'root_id', 'image' ,'visible', 'feautured_product', 'menu'];

	public function setNameAttribute($name)
	{
		$this->attributes['name'] = ucfirst($name);
	}

	public function childs()
	{
		return $this->hasMany(Category::class, 'root_id', 'id');
	}

	public function menuChilds(){
		return $this->childs->where('visible', 1)->where('menu', 1);
	}

	public function feautured()
	{
		return $this->belongsTo(Product::class, 'feautured_product', 'sku');
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}

	public function info()
	{
		return $this->hasMany(InfoInteres::class);
	}
}
