<?php

namespace Noblex\Repositories;

use Illuminate\Support\Facades\Cache;
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
		/*
		return Cache::tags('categorias')->rememberForever("categorias.index", function() {
            return $this->category->getAll();
        });
        */
	}


	public function findById($id) 
	{
		return Cache::tags('categorias')->rememberForever('categorias.{id}.edit', function() use ($id) {
            return $this->category->findById($id);
        });
	}


	public function store($request) 
	{
		$this->category->store($request);

		Cache::tags('categorias')->flush();
	}


	public function update($request, $id) 
	{
		$this->category->update($request, $id);

        Cache::tags('categorias')->flush();
	}


	public function destroy($id) 
	{
		$this->category->destroy($id);

        Cache::tags('categorias')->flush();
	}
}