<?php

namespace Noblex\Repositories;

use Noblex\Category;
use Noblex\Repositories\Interfaces\CategoryInterface;

class EloquentCategory implements CategoryInterface
{
	public function getAll($root_id=0) 
	{
		return Category::where('root_id', $root_id)->orderBy('id', 'DESC')->get();
	}
	

	public function findById($id) 
	{
        return Category::findOrFail($id);
	}


	public function store($request) 
	{
		$data = request()->validate([
            'name'    => 'required',
            'url'     => 'nullable',
            'root_id' => 'required',
            'feautured_product' => 'nullable'
        ]);

        if($data['url'] == null) 
            $data['url'] = str_slug($data['name']);
        else
            $data['url'] = str_slug($data['url']);

        if($request->input('visible') == 'on')
            $data['visible'] = 1;
        else
        	$data['visible'] = 0;

		Category::create($data);
	}


	public function update($request, $id) 
	{
		$data = request()->validate([
            'name'    => 'required',
            'url'       => 'nullable',
            'feautured_product' => 'nullable'
        ]);

        if($data['url'] == null) 
            $data['url'] = str_slug($data['name']);
        else
            $data['url'] = str_slug($data['url']);

        if($request->input('visible') == 'on')
            $data['visible'] = 1;
        else
        	$data['visible'] = 0;
        
        $categoria = Category::findOrFail($id);
        $categoria->update($data);
	}


	public function destroy($id) 
	{
		$categoria = Category::findOrFail($id);

        $categoria->delete();

        $subcategorias = Category::where('root_id', $id);

        $subcategorias->delete();
	}
}