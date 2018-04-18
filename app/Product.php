<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\ProductMedia;

class Product extends Model
{	
    protected $fillable = ["sku", "name", "brand_id", "category_id", "short_description", "description", "featured", "active"];

    public function productsMedia()
    {
    	return $this->hasMany(ProductMedia::class);
    }
}
