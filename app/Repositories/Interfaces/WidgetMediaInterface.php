<?php

namespace Noblex\Repositories\Interfaces;

interface WidgetMediaInterface 
{
	//public function getAll();

	public function findById($id);

	public function upload($request);

	public function update($request, $id);

	public function destroy($id);
}