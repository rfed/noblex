<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Category;
use Noblex\Feature;
use Noblex\ProductMedia;
use Noblex\Relatedproduct;

class Product extends Model
{	
    protected $fillable = ["sku", "name", "brand_id", "category_id", "short_description", "description", "featured", "active"];

    public function productsMedia()
    {
    	return $this->hasMany(ProductMedia::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function features()
    {
    	return $this->belongsToMany(Feature::class)->withTimestamps();
    }

    public function relatedproducts()
    {
        return $this->belongsToMany(Product::class, 'relatedproducts', 'product_id', 'product_relationship_id')->withTimestamps();
    }
}
