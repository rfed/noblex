<?php

namespace Noblex\Repositories\Interfaces;

interface GroupInterface 
{
	public function getAll();

	public function findById($id);

	public function store($request);

	public function update($request, $id);

	public function destroy($id);
}