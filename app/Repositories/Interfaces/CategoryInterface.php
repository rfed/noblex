<?php

namespace Noblex\Repositories\Interfaces;

interface CategoryInterface 
{
	public function getAll($root_id=0);

	public function getAllDistinctRaiz();

	public function getSubcategories($category);

	public function findById($id);

	public function store($request);

	public function update($request, $id);

	public function destroy($id);
}