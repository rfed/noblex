<?php

namespace Noblex\Repositories;

use \Validator;
use Noblex\Feature;
use Noblex\Repositories\Interfaces\FeatureInterface;

class EloquentFeature implements FeatureInterface
{

	public function getAll()
	{
		return Feature::orderBy('name')->get();
	}


	public function findById($id) 
	{
        return Feature::findOrFail($id);
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
				'image'					=> 'required',
                //'description'            => 'required'
            );

            $validator = Validator::make($request->all(), $rules);  // Validacion

            if($validator->fails())
            {
            	return \Response::json([
                    'errorValidation'  => $validator->errors()
                ]);
            }

            $data = Feature::create($request->all());

            return \Response::json([
                    'data'  	=> $data,
                    'redirect' 	=> '../features',
                    'message'	=> 'Feature agregada correctamente.'
            ]);


        }

        //return redirect()->route('admin.features.index')->with('success', 'Feature agregada correctamente.');

	}

	public function upload($request) 
	{
		
		if(!empty(request()->file('image_featured'))) {
			return $request->file('image_featured')->store('features', 'public');
		}

		if(!empty(request()->file('image'))) {
			return $request->file('image')->store('features', 'public');
		}
	}


	public function update($request, $id) 
	{
		$feature = Feature::findOrFail($id);
		$rules = array(
			'name'        			=> 'required',
			'image'					=> 'required',
			//'description'            => 'required'
		);

		$validator = Validator::make($request->all(), $rules);  // Validacion

		if($validator->fails())
		{
			return \Response::json([
				'errorValidation'  => $validator->errors()
			]);
		}

		$data = $feature->update($request->all());

		return \Response::json([
				'data'  	=> $feature,
				'redirect' 	=> '../features',
				'message'	=> 'Feature agregada correctamente.'
		]);

	}


	public function destroy($id) 
	{
		$feature = Feature::findOrFail($id);
		$feature->delete();
		return 'Ok';
	}
}