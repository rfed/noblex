<?php

namespace Noblex\Repositories;

use Noblex\Category;
use Noblex\InfoInteres;

use Noblex\Repositories\Interfaces\CategoryInterface;

class EloquentCategory implements CategoryInterface
{
	public function getAll($root_id=0) 
	{
		return Category::where('root_id', $root_id)->orderBy('id', 'DESC')->get();
	}


    public function getAllDistinctRaiz()
    {
        return Category::where('root_id', 1)->get();
    }
    

    public function getSubcategories($category)
    {
        return Category::where('root_id', $category)
                        ->where('name', '!=', 'Raiz')->get();
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
            'feautured_product' => 'nullable',
        ]);

        if($data['url'] == null) 
            $data['url'] = str_slug($data['name']);
        else
            $data['url'] = str_slug($data['url']);

        if($request->input('visible') == 'on')
            $data['visible'] = 1;
        else
            $data['visible'] = 0;
        
        if($request->input('menu') == 'on')
            $data['menu'] = 1;
        else
            $data['menu'] = 0;

		Category::create($data);
	}


	public function update($request, $id) 
	{

		$data = request()->validate([
            'name'    => 'required',
            'url'       => 'nullable',
            'feautured_product' => 'nullable',
        ]);

        if($data['url'] == null) 
            $data['url'] = str_slug($data['name']);
        else
            $data['url'] = str_slug($data['url']);

        if($request->input('visible') == 'on')
            $data['visible'] = 1;
        else
        	$data['visible'] = 0;
        
        if($request->input('menu') == 'on')
            $data['menu'] = 1;
        else
            $data['menu'] = 0;

        $categoria = Category::findOrFail($id);
        $categoria->update($data);
        
        if($request['info']){
            foreach($request['info'] as $info){
                if(array_key_exists('id', $info)){
                    $_info = InfoInteres::findOrFail($info['id']);
                    $_info->update($info);
                }else{
                    $info['category_id'] = $categoria->id;
                    InfoInteres::create($info);
                }
            }
        }
        
	}


	public function destroy($id) 
	{
		$categoria = Category::findOrFail($id);

        $categoria->delete();

        $subcategorias = Category::where('root_id', $id);

        $subcategorias->delete();
	}
}