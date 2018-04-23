<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Product;

class Brand extends Model
{
    protected $fillable = ['name'];

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
