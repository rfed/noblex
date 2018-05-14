<?php

namespace Noblex\Repositories\Interfaces;

interface SubjectInterface 
{
	public function getAll();

	public function findById($subject);

	public function store($request);

	public function update($request, $subject);

	public function destroy($subject);
}