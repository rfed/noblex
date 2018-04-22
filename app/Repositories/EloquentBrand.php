<?php 

namespace Noblex\Repositories;

use Noblex\Brand;
use Noblex\Repositories\Interfaces\BrandInterface;

class EloquentBrand implements BrandInterface
{
	public function getAll()
	{
		return Brand::all();
	}


	public function findById($id) 
	{
        return Brand::findOrFail($id);
	}


	public function store($request) 
	{
		$data = $request->validate([
			'name'	=> 'required'
		]);

		Brand::create($data);
	}


	public function update($request, $id) 
	{
		$data = $request->validate([
			'name'	=> 'required'
		]);

		$brand = $this->findById($id);
		$brand->fill($data)->save();
	}


	public function destroy($id) 
	{
		$brand = $this->findById($id);
        $brand->delete();
	}
}