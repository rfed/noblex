<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Product;

class ProductSection extends Model
{
    protected $table = 'sectionproducts';

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
