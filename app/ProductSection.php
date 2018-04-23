<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;

class ProductSection extends Model
{
    protected $table = 'sectionproducts';

    protected $fillable = ['product_id', 'title', 'subtitle', 'description', 'source', 'alignment'];
}
