<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["sku", "name", "brand_id", "category_id", "short_description", "description", "active"];
}
