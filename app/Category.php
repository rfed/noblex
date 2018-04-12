<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'url'];

	public function setNameAttribute($name)
	{
		$this->attributes['name'] = ucfirst($name);
	}
}
