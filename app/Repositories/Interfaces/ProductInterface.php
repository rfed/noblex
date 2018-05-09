<?php

namespace Noblex\Repositories\Interfaces;

interface ProductInterface 
{
	public function getAll();

	public function getAllWithManualAndActive();

	public function getAllDistinctId($id);

	public function findById($id);

	public function store($request);

	public function update($request, $id);

	public function destroy($id);
}