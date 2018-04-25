<?php

namespace Noblex\Repositories;

use \Validator;
use Noblex\Group;

use Noblex\Repositories\Interfaces\GroupInterface;

class EloquentGroup implements GroupInterface
{

	public function getAll()
	{
		return Group::all();
	}


	public function findById($id) 
	{
        return Group::findOrFail($id);
	}


	public function store($request) 
	{
		if($request->ajax())
        {
        	/*$data = $request->validate([
				'name'			=> 'required',
				'description'	=> 'required'
			]);*/

			$rules = array(
                'name'        			=> 'required',
                //'description'            => 'required'
            );

            $validator = Validator::make($request->all(), $rules);  // Validacion

            if($validator->fails())
            {
            	return \Response::json([
                    'errorValidation'  => $validator->errors()
                ]);
            }

            $data = Group::create($request->all());

            return \Response::json([
                    'data'  	=> $data,
                    'redirect' 	=> '../groups',
                    'message'	=> 'Grupo de atributos agregado correctamente.'
            ]);


        }

        //return redirect()->route('admin.features.index')->with('success', 'Feature agregada correctamente.');

	}

	public function update($request, $id) 
	{
		$data = $request->validate([
			'name'	=> 'required'
		]);

		$group = $this->findById($id);
		$group->fill($data)->save();
	}


	public function destroy($id) 
	{
		$group = $this->findById($id);
        $group->delete();
	}
}