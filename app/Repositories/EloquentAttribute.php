<?php

namespace Noblex\Repositories;

use \Validator;
use Noblex\Attribute;

use Noblex\Repositories\Interfaces\AttributeInterface;

class EloquentAttribute implements AttributeInterface
{

	public function getAll()
	{
		return Attribute::all();
	}


	public function findById($id) 
	{
        return Attribute::findOrFail($id);
	}


	public function store($request) 
	{
		$rules = array(
			'name'					=> 'required',
		);

		$validator = Validator::make($request->all(), $rules);  // Validacion

		if($validator->fails())
		{
			
			return $validator->errors();
		}

		$data = Attribute::create($request->all());

		// return \Response::json([
		// 		'data'  	=> $data,
		// 		'redirect' 	=> '../attributes',
		// 		'message'	=> 'Atributo agregado correctamente.'
		// ]);

	}

	public function update($request, $id) 
	{
		$data = $request->validate([
			'name'	=> 'required',
			'attributegroup_id' => 'nullable'
		]);

		$attribute = $this->findById($id);
		$attribute->fill($data)->save();
	}


	public function destroy($id) 
	{
		$attribute = $this->findById($id);
        $attribute->delete();
	}
}