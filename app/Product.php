<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Category;
use Noblex\ProductMedia;

class Product extends Model
{	
    protected $fillable = ["sku", "name", "brand_id", "category_id", "short_description", "description", "featured", "active"];

    public function productsMedia()
    {
    	return $this->hasMany(ProductMedia::class);
    }

    public function featuredImg()
    {
    	return $this->hasOne(ProductMedia::class)->where('featured', 1);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
