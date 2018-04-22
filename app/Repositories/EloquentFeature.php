<?php

namespace Noblex\Repositories;

use Noblex\Feature;
use Noblex\Repositories\Interfaces\FeatureInterface;

class EloquentFeature implements FeatureInterface
{
	public function getAll()
	{
		return Feature::all();
	}
}