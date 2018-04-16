<?php

namespace Noblex\Repositories;

use Noblex\Brand;

class EloquentBrand 
{
	public function getAll()
	{
		return Brand::all();
	}
}