<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Product;

class ProductMedia extends Model
{
	protected $table = 'products_media';
	
    protected $fillable = ["product_id", "source", "type", "position"];

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
