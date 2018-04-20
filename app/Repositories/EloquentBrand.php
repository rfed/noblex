<?php

namespace Noblex\Repositories;

use Noblex\Brand;
use Noblex\Repositories\Interfaces\BrandInterface;

class EloquentBrand implements BrandInterface 
{
	public function getAll()
	{
		return Brand::all();
	}
}