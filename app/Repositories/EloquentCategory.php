<?php

namespace Noblex\Repositories;

use Noblex\Category;

class EloquentCategory
{
	public function getAll() 
	{
		return Category::OrderBy('id', 'DESC')->get();
	}
	

	public function findById($id) 
	{
        return Category::findOrFail($id);
	}


	public function store($request) 
	{
		$data = request()->validate([
            'name'    => 'required',
            'url'       => 'nullable'
        ]);

        if($data['url'] == null) 
            $data['url'] = str_slug($data['name']);
        else
            $data['url'] = str_slug($data['url']);

		Category::create($data);
	}


	public function update($request, $id) 
	{
		$data = request()->validate([
            'name'    => 'required',
            'url'       => 'nullable'
        ]);

        if($data['url'] == null) 
            $data['url'] = str_slug($data['name']);
        else
            $data['url'] = str_slug($data['url']);
        
        $categoria = Category::findOrFail($id);
        $categoria->update($data);
	}


	public function destroy($id) 
	{
		$categoria = Category::findOrFail($id);

        $categoria->delete();
	}
}