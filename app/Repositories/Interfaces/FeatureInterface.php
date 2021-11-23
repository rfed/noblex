<?php

namespace Noblex\Repositories\Interfaces;

interface FeatureInterface 
{
	public function getAll();

	public function findById($id);

	public function store($request);

	public function update($request, $id);

	public function destroy($id);
}