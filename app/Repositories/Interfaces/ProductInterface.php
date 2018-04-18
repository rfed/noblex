<?php

namespace Noblex\Repositories\Interfaces;

interface ProductInterface 
{
	public function getAll();

	//public function findById($id);

	public function store($request);

	public function getAllById($id);

	//public function update($request, $id);

	//public function destroy($id);
}