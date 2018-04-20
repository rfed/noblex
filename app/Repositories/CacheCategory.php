<?php

namespace Noblex\Repositories;

use Noblex\Repositories\EloquentCategory;
use Noblex\Repositories\Interfaces\CategoryInterface;

class CacheCategory implements CategoryInterface
{
	protected $category;

	public function __construct(EloquentCategory $category) 
	{
		$this->category = $category;
	}


	public function getAll($root_id=0) 
	{
		return $this->category->getAll($root_id);
	}


	public function findById($id) 
	{
        return $this->category->findById($id);
	}


	public function store($request) 
	{
		$this->category->store($request);
	}


	public function update($request, $id) 
	{
		$this->category->update($request, $id);
	}


	public function destroy($id) 
	{
		$this->category->destroy($id);
	}
}