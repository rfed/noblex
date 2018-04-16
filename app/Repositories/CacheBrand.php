<?php 

namespace Noblex\Repositories;

use Illuminate\Support\Facades\Cache;
use Noblex\Repositories\EloquentBrand;
use Noblex\Repositories\Interfaces\BrandInterface;

class CacheBrand implements BrandInterface 
{
	private $brand;

	public function __construct(EloquentBrand $brand)
	{
		$this->brand = $brand;
	}

	public function getAll()
	{
		return Cache::tags('brands')->rememberForever('brands.index', function() {
			return $this->brand->getAll();
		});
	}
}