<?php

namespace Noblex\Repositories\Interfaces;

interface WidgetInterface 
{
	public function getAll();

	public function getWidgets();

	public function findById($id);

	public function store($request);

	public function update($request, $id);

	public function destroy($id);

	public function slider();

	public function home();

	public function promoboxes();
}