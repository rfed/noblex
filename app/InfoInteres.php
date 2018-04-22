<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;

class InfoInteres extends Model
{
	public $timestamps = false;
	protected $fillable = ['category_id', 'text', 'url'];
	protected $table = 'category_info_interes';
}
